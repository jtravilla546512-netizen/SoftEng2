<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\InventoryItem;
use App\Models\LaborCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Store a new booking from customer
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
                'appliance' => 'required|in:Aircon,Refrigerator',
                'service_type' => 'required|in:Repair,Installation,Maintenance',
                'issue_description' => 'nullable|string',
                'location' => 'required|string',
                'service_date' => 'required|date',
                'service_time' => 'required',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            // Find or create customer
            $customer = Customer::firstOrCreate(
                ['phone' => $validated['phone']],
                [
                    'name' => $validated['name'],
                    'address' => $validated['address'],
                    'customer_since' => now(),
                ]
            );

            // Generate booking number
            $bookingNumber = Booking::generateBookingNumber($validated['service_type']);

            // Create booking
            $booking = Booking::create([
                'booking_number' => $bookingNumber,
                'customer_id' => $customer->id,
                'appliance' => $validated['appliance'],
                'service_type' => $validated['service_type'],
                'issue_description' => $validated['issue_description'],
                'location' => $validated['location'],
                'service_date' => $validated['service_date'],
                'service_time' => $validated['service_time'],
                'status' => 'Pending',
            ]);

            DB::commit();

            // Return JSON response for API calls
            return response()->json([
                'success' => true,
                'message' => "Booking {$bookingNumber} created successfully!",
                'booking' => $booking->load('customer')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Assign technician to booking
     */
    public function assignTechnician(Request $request, $id)
    {
        $validated = $request->validate([
            'technician_id' => 'required|exists:technicians,id',
        ]);

        $booking = Booking::findOrFail($id);

        // Check if technician can handle this appliance
        $technician = Technician::findOrFail($validated['technician_id']);
        if (!$technician->canHandle($booking->appliance)) {
            return response()->json([
                'success' => false,
                'message' => "Technician cannot handle {$booking->appliance}"
            ], 400);
        }

        $booking->assignTechnician($validated['technician_id']);

        return response()->json([
            'success' => true,
            'message' => 'Technician assigned successfully',
            'booking' => $booking->load('technician')
        ]);
    }

    /**
     * Complete booking with parts
     */
    public function complete(Request $request, $id)
    {
        $validated = $request->validate([
            'parts' => 'required|array',
            'parts.*.inventory_item_id' => 'required|exists:inventory_items,id',
            'parts.*.quantity' => 'required|integer|min:1',
        ]);

        $booking = Booking::findOrFail($id);

        // Check if booking is assigned
        if (!$booking->isAssigned()) {
            return response()->json([
                'success' => false,
                'message' => 'Booking must be assigned to a technician first'
            ], 400);
        }

        // Check stock availability
        foreach ($validated['parts'] as $part) {
            $item = InventoryItem::find($part['inventory_item_id']);
            if ($item->quantity < $part['quantity']) {
                return response()->json([
                    'success' => false,
                    'message' => "Insufficient stock for {$item->name}. Available: {$item->quantity}"
                ], 400);
            }
        }

        DB::beginTransaction();
        try {
            $booking->complete($validated['parts']);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Booking completed successfully',
                'booking' => $booking->load(['bookingParts.inventoryItem', 'customer', 'technician'])
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to complete booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get pending bookings for dashboard
     */
    public function getPendingBookings()
    {
        $bookings = Booking::with(['customer', 'technician'])
            ->whereIn('status', ['Pending', 'Assigned'])
            ->orderBy('service_date')
            ->orderBy('service_time')
            ->get();

        return response()->json($bookings);
    }

    /**
     * Get completed bookings
     */
    public function getCompletedBookings()
    {
        $bookings = Booking::with(['customer', 'technician', 'bookingParts.inventoryItem'])
            ->where('status', 'Completed')
            ->orderBy('completed_at', 'desc')
            ->get();

        return response()->json($bookings);
    }

    /**
     * Get booking details
     */
    public function show($id)
    {
        $booking = Booking::with(['customer', 'technician', 'bookingParts.inventoryItem'])
            ->findOrFail($id);

        return response()->json($booking);
    }

    /**
     * Get available parts for booking based on service and appliance
     */
    public function getAvailableParts($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        $category = match(true) {
            $booking->service_type === 'Installation' && $booking->appliance === 'Aircon'
                => 'Aircon Units',
            $booking->service_type === 'Installation' && $booking->appliance === 'Refrigerator'
                => 'Refrigerator Units',
            $booking->appliance === 'Aircon'
                => 'Aircon Spare Parts',
            $booking->appliance === 'Refrigerator'
                => 'Refrigerator Spare Parts',
        };

        $parts = InventoryItem::where('category', $category)
            ->where('quantity', '>', 0)
            ->orderBy('name')
            ->get();

        return response()->json($parts);
    }
}
