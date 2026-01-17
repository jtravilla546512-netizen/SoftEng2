<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'name',
        'brand',
        'image',
        'category',
        'description',
        'quantity',
        'reorder_point',
        'cost_price',
        'selling_price',
        'status',
    ];

    protected $casts = [
        'cost_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
    ];

    /**
     * Get stock movements for this item
     */
    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    /**
     * Get bookings that used this item
     */
    public function bookingParts()
    {
        return $this->hasMany(BookingPart::class);
    }

    /**
     * Check if item is low stock
     */
    public function isLowStock()
    {
        return $this->quantity > 0 && $this->quantity <= $this->reorder_point;
    }

    /**
     * Check if item is out of stock
     */
    public function isOutOfStock()
    {
        return $this->quantity <= 0;
    }

    /**
     * Update stock status based on quantity
     */
    public function updateStockStatus()
    {
        if ($this->quantity <= 0) {
            $this->status = 'Out of Stock';
        } elseif ($this->quantity <= $this->reorder_point) {
            $this->status = 'Low Stock';
        } else {
            $this->status = 'In Stock';
        }
        $this->save();
    }

    /**
     * Deduct stock
     */
    public function deductStock($quantity, $reason = null, $bookingId = null)
    {
        $previousStock = $this->quantity;
        $this->quantity -= $quantity;
        $this->save();
        $this->updateStockStatus();

        // Default to "Used in Service" if no reason provided and booking ID exists
        if (!$reason && $bookingId) {
            $reason = 'Used in Service';
        } elseif (!$reason) {
            $reason = 'Stock removed';
        }

        // Log stock movement
        StockMovement::create([
            'inventory_item_id' => $this->id,
            'booking_id' => $bookingId,
            'type' => 'Stock Out',
            'quantity' => $quantity,
            'previous_stock' => $previousStock,
            'new_stock' => $this->quantity,
            'reason' => $reason,
            'performed_by' => $bookingId ? 'System' : 'Admin User',
        ]);

        return $this;
    }

    /**
     * Add stock
     */
    public function addStock($quantity, $reason = 'Stock In')
    {
        $previousStock = $this->quantity;
        $this->quantity += $quantity;
        $this->save();
        $this->updateStockStatus();

        // Log stock movement
        StockMovement::create([
            'inventory_item_id' => $this->id,
            'type' => 'Stock In',
            'quantity' => $quantity,
            'previous_stock' => $previousStock,
            'new_stock' => $this->quantity,
            'reason' => $reason,
            'performed_by' => 'Admin User',
        ]);

        return $this;
    }

    /**
     * Get profit margin
     */
    public function getProfitMarginAttribute()
    {
        return $this->selling_price - $this->cost_price;
    }

    /**
     * Get profit percentage
     */
    public function getProfitPercentageAttribute()
    {
        if ($this->cost_price > 0) {
            return (($this->selling_price - $this->cost_price) / $this->cost_price) * 100;
        }
        return 0;
    }
}
