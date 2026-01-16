<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'customer_since',
        'total_bookings',
        'total_spent',
    ];

    protected $casts = [
        'customer_since' => 'date',
        'total_spent' => 'decimal:2',
    ];

    /**
     * Get all bookings for this customer
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get pending bookings
     */
    public function pendingBookings()
    {
        return $this->hasMany(Booking::class)->where('status', 'Pending');
    }

    /**
     * Get completed bookings
     */
    public function completedBookings()
    {
        return $this->hasMany(Booking::class)->where('status', 'Completed');
    }

    /**
     * Check if customer is new (only 1 booking)
     */
    public function isNewCustomer()
    {
        return $this->total_bookings <= 1;
    }

    /**
     * Check if customer is returning (2+ bookings)
     */
    public function isReturningCustomer()
    {
        return $this->total_bookings >= 2;
    }
}
