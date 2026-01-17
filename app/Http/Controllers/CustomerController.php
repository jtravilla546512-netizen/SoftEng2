<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display all customers
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();
        return view('admin.customers', compact('customers'));
    }

    /**
     * Get customers with filters
     */
    public function getCustomers(Request $request)
    {
        $query = Customer::with(['bookings' => function($q) {
            $q->select('customer_id', 'status')->orderBy('service_date', 'desc');
        }]);

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }

        if ($request->has('type')) {
            if ($request->type === 'new') {
                $query->where('total_bookings', '<=', 1);
            } elseif ($request->type === 'returning') {
                $query->where('total_bookings', '>=', 2);
            }
        }

        $customers = $query->orderBy('name')->get();

        // Add latest service status to each customer
        $customers->each(function($customer) {
            $latestBooking = $customer->bookings->first();
            $customer->latest_service_status = $latestBooking ? $latestBooking->status : 'No Service';
        });

        return response()->json($customers);
    }

    /**
     * Show customer profile with booking history
     */
    public function show($id)
    {
        $customer = Customer::with(['bookings' => function($query) {
            $query->with('technician')
                  ->orderBy('service_date', 'desc');
        }])->findOrFail($id);

        // If request wants JSON (API call), return JSON
        if (request()->wantsJson() || request()->is('api/*')) {
            return response()->json($customer);
        }

        // Otherwise return view
        return view('admin.customer-detail', compact('customer'));
    }

    /**
     * Update customer details
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'phone' => 'string|max:20',
            'address' => 'string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Customer updated successfully',
            'customer' => $customer
        ]);
    }

    /**
     * Get customer statistics
     */
    public function getStats()
    {
        $stats = [
            'total' => Customer::count(),
            'new' => Customer::where('total_bookings', '<=', 1)->count(),
            'returning' => Customer::where('total_bookings', '>=', 2)->count(),
            'total_revenue' => Customer::sum('total_spent'),
        ];

        return response()->json($stats);
    }

    /**
     * Get top customers by spending
     */
    public function getTopCustomers($limit = 10)
    {
        $customers = Customer::where('total_spent', '>', 0)
                             ->orderBy('total_spent', 'desc')
                             ->limit($limit)
                             ->get();

        return response()->json($customers);
    }
}
