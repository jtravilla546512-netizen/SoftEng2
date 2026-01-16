<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'inventory_item_id',
        'quantity',
        'unit_price',
        'subtotal',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    /**
     * Get the booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get the inventory item
     */
    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class);
    }
}
