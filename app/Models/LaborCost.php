<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'cost',
        'previous_cost',
        'effective_date',
        'modified_by',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'previous_cost' => 'decimal:2',
        'effective_date' => 'datetime',
    ];

    /**
     * Get current labor cost for a service type
     */
    public static function getCurrentCost($serviceType)
    {
        return self::where('service_type', $serviceType)
            ->orderBy('effective_date', 'desc')
            ->first()
            ->cost ?? 0;
    }

    /**
     * Get all current labor costs
     */
    public static function getCurrentCosts()
    {
        return [
            'Repair' => self::getCurrentCost('Repair'),
            'Installation' => self::getCurrentCost('Installation'),
            'Maintenance' => self::getCurrentCost('Maintenance'),
        ];
    }

    /**
     * Get price change amount
     */
    public function getChangeAmountAttribute()
    {
        if ($this->previous_cost) {
            return $this->cost - $this->previous_cost;
        }
        return 0;
    }

    /**
     * Check if price increased
     */
    public function isPriceIncrease()
    {
        return $this->change_amount > 0;
    }

    /**
     * Check if price decreased
     */
    public function isPriceDecrease()
    {
        return $this->change_amount < 0;
    }
}
