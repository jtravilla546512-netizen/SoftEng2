<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_item_id',
        'booking_id',
        'type',
        'quantity',
        'previous_stock',
        'new_stock',
        'reason',
        'performed_by',
    ];

    /**
     * Get the inventory item
     */
    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class);
    }

    /**
     * Get the related booking (if any)
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
