<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'customer_id',
        'technician_id',
        'appliance',
        'service_type',
        'issue_description',
        'location',
        'service_date',
        'service_time',
        'status',
        'labor_cost',
        'parts_cost',
        'total_amount',
        'assigned_at',
        'completed_at',
        'cancellation_reason',
        'cancelled_at',
    ];

    protected $casts = [
        'service_date' => 'date',
        'labor_cost' => 'decimal:2',
        'parts_cost' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'assigned_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    /**
     * Get the customer for this booking
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the assigned technician
     */
    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    /**
     * Get parts used in this booking
     */
    public function bookingParts()
    {
        return $this->hasMany(BookingPart::class);
    }

    /**
     * Get stock movements related to this booking
     */
    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    /**
     * Generate unique booking number
     */
    public static function generateBookingNumber($serviceType)
    {
        $prefix = match($serviceType) {
            'Repair' => 'RP',
            'Installation' => 'INS',
            'Maintenance' => 'MN',
            default => 'BK'
        };

        $lastBooking = self::where('booking_number', 'like', $prefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        if ($lastBooking) {
            $lastNumber = intval(substr($lastBooking->booking_number, strlen($prefix)));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        return $prefix . $newNumber;
    }

    /**
     * Assign technician to booking
     */
    public function assignTechnician($technicianId)
    {
        $this->technician_id = $technicianId;
        $this->status = 'Assigned';
        $this->assigned_at = Carbon::now();
        $this->save();

        // Update technician's active jobs count
        $technician = Technician::find($technicianId);
        $technician->increment('active_jobs');

        return $this;
    }

    /**
     * Complete booking with parts
     */
    public function complete(array $parts)
    {
        $laborCost = LaborCost::getCurrentCost($this->service_type);
        $partsCost = 0;

        // Process each part
        foreach ($parts as $part) {
            $inventoryItem = InventoryItem::find($part['inventory_item_id']);
            $quantity = $part['quantity'];
            $unitPrice = $inventoryItem->selling_price;
            $subtotal = $quantity * $unitPrice;

            // Create booking part record
            BookingPart::create([
                'booking_id' => $this->id,
                'inventory_item_id' => $inventoryItem->id,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'subtotal' => $subtotal,
            ]);

            // Deduct from inventory
            $inventoryItem->deductStock($quantity, "Used in booking {$this->booking_number}", $this->id);

            $partsCost += $subtotal;
        }

        // Update booking totals
        $this->labor_cost = $laborCost;
        $this->parts_cost = $partsCost;
        $this->total_amount = $laborCost + $partsCost;
        $this->status = 'Completed';
        $this->completed_at = Carbon::now();
        $this->save();

        // Update technician stats
        if ($this->technician) {
            $this->technician->decrement('active_jobs');
            $this->technician->increment('jobs_completed');
            $this->technician->increment('total_revenue', $this->total_amount);
        }

        // Update customer stats
        $this->customer->increment('total_bookings');
        $this->customer->increment('total_spent', $this->total_amount);

        return $this;
    }

    /**
     * Check if booking is pending
     */
    public function isPending()
    {
        return $this->status === 'Pending';
    }

    /**
     * Check if booking is assigned
     */
    public function isAssigned()
    {
        return $this->status === 'Assigned';
    }

    /**
     * Check if booking is completed
     */
    public function isCompleted()
    {
        return $this->status === 'Completed';
    }
}
