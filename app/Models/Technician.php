<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'specializations',
        'status',
        'jobs_completed',
        'active_jobs',
        'average_rating',
        'total_revenue',
        'date_hired',
    ];

    protected $casts = [
        'specializations' => 'array',
        'date_hired' => 'date',
        'average_rating' => 'decimal:2',
        'total_revenue' => 'decimal:2',
    ];

    /**
     * Get all bookings assigned to this technician
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get active/assigned bookings
     */
    public function activeBookings()
    {
        return $this->hasMany(Booking::class)->whereIn('status', ['Assigned']);
    }

    /**
     * Get completed bookings
     */
    public function completedBookings()
    {
        return $this->hasMany(Booking::class)->where('status', 'Completed');
    }

    /**
     * Check if technician is available
     */
    public function isAvailable()
    {
        return $this->status === 'Available';
    }

    /**
     * Check if technician can handle specific appliance
     */
    public function canHandle($appliance)
    {
        return in_array($appliance, $this->specializations);
    }

    /**
     * Get specializations as comma-separated string
     */
    public function getSpecializationsStringAttribute()
    {
        return implode(', ', $this->specializations);
    }
}
