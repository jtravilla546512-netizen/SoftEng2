<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display all inventory items
     */
    public function index()
    {
        $inventory = InventoryItem::orderBy('category')
                                  ->orderBy('name')
                                  ->get();
        return view('admin.inventory', compact('inventory'));
    }

    /**
     * Get inventory with filters
     */
    public function getInventory(Request $request)
    {
        $query = InventoryItem::query();

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('item_code', 'like', "%{$request->search}%");
            });
        }

        $inventory = $query->orderBy('category')->orderBy('name')->get();

        return response()->json($inventory->map(fn($item) => $this->formatItem($item)));
    }

    /**
     * Store new inventory item
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'category' => 'required|in:Aircon Unit,Spare Parts,Refrigerator Unit',
            'description' => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'cost_price' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            // Generate item code
            $itemCode = 'ITM-' . strtoupper(uniqid());

            $item = InventoryItem::create([
                'item_code' => $itemCode,
                'name' => $validated['name'],
                'brand' => $validated['brand'] ?? 'Generic',
                'category' => $validated['category'],
                'description' => $validated['description'] ?? null,
                'quantity' => $validated['stock_quantity'],
                'reorder_point' => $validated['minimum_stock'],
                'cost_price' => $validated['cost_price'],
                'selling_price' => $validated['price'],
            ]);

            // Create initial stock movement record
            if ($item->quantity > 0) {
                StockMovement::create([
                    'inventory_item_id' => $item->id,
                    'type' => 'Stock In',
                    'quantity' => $item->quantity,
                    'previous_stock' => 0,
                    'new_stock' => $item->quantity,
                    'reason' => 'Initial stock',
                    'performed_by' => 'Admin'
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Item added successfully',
                'item' => $this->formatItem($item)
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add item: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show specific inventory item
     */
    public function show($id)
    {
        $item = InventoryItem::findOrFail($id);
        return response()->json($this->formatItem($item));
    }

    /**
     * Update inventory item
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'brand' => 'nullable|string|max:255',
            'category' => 'in:Aircon Unit,Spare Parts,Refrigerator Unit',
            'description' => 'nullable|string',
            'minimum_stock' => 'integer|min:0',
            'cost_price' => 'numeric|min:0',
            'price' => 'numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = InventoryItem::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image && file_exists(public_path($item->image))) {
                unlink(public_path($item->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/inventory'), $imageName);
            $item->image = 'images/inventory/' . $imageName;
        }

        $updateData = [];
        if (isset($validated['name'])) $updateData['name'] = $validated['name'];
        if (isset($validated['brand'])) $updateData['brand'] = $validated['brand'];
        if (isset($validated['category'])) $updateData['category'] = $validated['category'];
        if (isset($validated['description'])) $updateData['description'] = $validated['description'];
        if (isset($validated['minimum_stock'])) $updateData['reorder_point'] = $validated['minimum_stock'];
        if (isset($validated['cost_price'])) $updateData['cost_price'] = $validated['cost_price'];
        if (isset($validated['price'])) $updateData['selling_price'] = $validated['price'];
        if (isset($item->image)) $updateData['image'] = $item->image;

        $item->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Item updated successfully',
            'item' => $this->formatItem($item->fresh())
        ]);
    }

    /**
     * Format item for frontend
     */
    private function formatItem($item)
    {
        return [
            'id' => $item->id,
            'item_code' => $item->item_code,
            'name' => $item->name,
            'brand' => $item->brand ?? 'Generic',
            'image' => $item->image ? asset($item->image) : null,
            'category' => $item->category,
            'description' => $item->description,
            'stock_quantity' => $item->quantity,
            'minimum_stock' => $item->reorder_point,
            'cost_price' => $item->cost_price,
            'price' => $item->selling_price,
            'status' => $item->status,
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at,
        ];
    }

    /**
     * Add stock to item
     */
    public function addStock(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string',
        ]);

        $item = InventoryItem::findOrFail($id);
        $item->addStock($validated['quantity'], $validated['reason']);

        return response()->json([
            'success' => true,
            'message' => 'Stock added successfully',
            'item' => $this->formatItem($item->fresh())
        ]);
    }

    /**
     * Remove stock from inventory item
     */
    public function removeStock(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string',
            'booking_id' => 'nullable|integer|exists:bookings,id',
        ]);

        $item = InventoryItem::findOrFail($id);

        // Check if there's enough stock
        if ($item->quantity < $validated['quantity']) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock. Current stock: ' . $item->quantity
            ], 400);
        }

        $previousStock = $item->quantity;
        $item->quantity -= $validated['quantity'];
        $item->save();

        // Create stock movement record
        StockMovement::create([
            'inventory_item_id' => $item->id,
            'booking_id' => $validated['booking_id'] ?? null,
            'type' => 'Stock Out',
            'quantity' => $validated['quantity'],
            'previous_stock' => $previousStock,
            'new_stock' => $item->quantity,
            'reason' => $validated['reason'] ?? 'Stock removed',
            'performed_by' => 'Admin'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Stock removed successfully',
            'item' => $this->formatItem($item->fresh())
        ]);
    }

    /**
     * Get stock movements for an item
     */
    public function getStockMovements($id)
    {
        $movements = StockMovement::where('inventory_item_id', $id)
                                  ->orderBy('created_at', 'desc')
                                  ->limit(50)
                                  ->get();

        return response()->json($movements);
    }

    /**
     * Get low stock items
     */
    public function getLowStock()
    {
        $items = InventoryItem::whereColumn('quantity', '<=', 'reorder_point')
                              ->where('quantity', '>', 0)
                              ->orderBy('quantity')
                              ->get();

        return response()->json($items);
    }

    /**
     * Get out of stock items
     */
    public function getOutOfStock()
    {
        $items = InventoryItem::where('quantity', '<=', 0)
                              ->orderBy('name')
                              ->get();

        return response()->json($items);
    }

    /**
     * Get inventory statistics
     */
    public function getStats()
    {
        $stats = [
            'total_items' => InventoryItem::count(),
            'in_stock' => InventoryItem::where('status', 'In Stock')->count(),
            'low_stock' => InventoryItem::where('status', 'Low Stock')->count(),
            'out_of_stock' => InventoryItem::where('status', 'Out of Stock')->count(),
            'total_value' => InventoryItem::sum(DB::raw('quantity * cost_price')),
        ];

        return response()->json($stats);
    }

    /**
     * Delete inventory item
     */
    public function destroy($id)
    {
        $item = InventoryItem::findOrFail($id);

        // Check if item has been used in bookings
        if ($item->bookingParts()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete item that has been used in bookings'
            ], 400);
        }

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully'
        ]);
    }
}
