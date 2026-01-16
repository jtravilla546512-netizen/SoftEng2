<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Technician;
use App\Models\InventoryItem;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display reports page
     */
    public function index()
    {
        return view('admin.reports');
    }

    /**
     * Get revenue analytics
     */
    public function getRevenueAnalytics(Request $request)
    {
        $period = $request->input('period', 'monthly'); // daily, weekly, monthly

        $query = Booking::where('status', 'Completed');

        switch ($period) {
            case 'daily':
                $data = $query->select(
                    DB::raw('DATE(completed_at) as date'),
                    DB::raw('COUNT(*) as total_bookings'),
                    DB::raw('SUM(total_amount) as revenue')
                )
                ->groupBy('date')
                ->orderBy('date', 'desc')
                ->limit(30)
                ->get();
                break;

            case 'weekly':
                $data = $query->select(
                    DB::raw('YEAR(completed_at) as year'),
                    DB::raw('WEEK(completed_at) as week'),
                    DB::raw('COUNT(*) as total_bookings'),
                    DB::raw('SUM(total_amount) as revenue')
                )
                ->groupBy('year', 'week')
                ->orderBy('year', 'desc')
                ->orderBy('week', 'desc')
                ->limit(12)
                ->get();
                break;

            case 'monthly':
            default:
                $data = $query->select(
                    DB::raw('YEAR(completed_at) as year'),
                    DB::raw('MONTH(completed_at) as month'),
                    DB::raw('COUNT(*) as total_bookings'),
                    DB::raw('SUM(total_amount) as revenue')
                )
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->limit(12)
                ->get();
                break;
        }

        return response()->json($data);
    }

    /**
     * Get service type analytics
     */
    public function getServiceAnalytics()
    {
        $data = Booking::where('status', 'Completed')
                       ->select(
                           'service_type',
                           DB::raw('COUNT(*) as total_bookings'),
                           DB::raw('SUM(total_amount) as revenue'),
                           DB::raw('AVG(total_amount) as average_amount')
                       )
                       ->groupBy('service_type')
                       ->get();

        return response()->json($data);
    }

    /**
     * Get appliance type analytics
     */
    public function getApplianceAnalytics()
    {
        $data = Booking::where('status', 'Completed')
                       ->select(
                           'appliance',
                           DB::raw('COUNT(*) as total_bookings'),
                           DB::raw('SUM(total_amount) as revenue')
                       )
                       ->groupBy('appliance')
                       ->get();

        return response()->json($data);
    }

    /**
     * Get technician performance
     */
    public function getTechnicianPerformance()
    {
        $technicians = Technician::with(['completedBookings' => function($query) {
            $query->select('technician_id', DB::raw('COUNT(*) as jobs'), DB::raw('SUM(total_amount) as revenue'));
        }])
        ->orderBy('total_revenue', 'desc')
        ->get();

        return response()->json($technicians);
    }

    /**
     * Get inventory usage analytics
     */
    public function getInventoryAnalytics()
    {
        $data = DB::table('booking_parts')
                  ->join('inventory_items', 'booking_parts.inventory_item_id', '=', 'inventory_items.id')
                  ->select(
                      'inventory_items.name',
                      'inventory_items.category',
                      DB::raw('SUM(booking_parts.quantity) as total_used'),
                      DB::raw('COUNT(DISTINCT booking_parts.booking_id) as times_used'),
                      DB::raw('SUM(booking_parts.subtotal) as revenue')
                  )
                  ->groupBy('inventory_items.id', 'inventory_items.name', 'inventory_items.category')
                  ->orderBy('total_used', 'desc')
                  ->limit(20)
                  ->get();

        return response()->json($data);
    }

    /**
     * Get customer analytics
     */
    public function getCustomerAnalytics()
    {
        $stats = [
            'total_customers' => Customer::count(),
            'new_customers' => Customer::where('total_bookings', '<=', 1)->count(),
            'returning_customers' => Customer::where('total_bookings', '>=', 2)->count(),
            'top_customers' => Customer::orderBy('total_spent', 'desc')->limit(10)->get(),
        ];

        return response()->json($stats);
    }

    /**
     * Get overall statistics
     */
    public function getOverallStats()
    {
        $stats = [
            // Booking stats
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'Pending')->count(),
            'assigned_bookings' => Booking::where('status', 'Assigned')->count(),
            'completed_bookings' => Booking::where('status', 'Completed')->count(),

            // Revenue stats
            'total_revenue' => Booking::where('status', 'Completed')->sum('total_amount'),
            'labor_revenue' => Booking::where('status', 'Completed')->sum('labor_cost'),
            'parts_revenue' => Booking::where('status', 'Completed')->sum('parts_cost'),

            // Today's stats
            'today_bookings' => Booking::whereDate('created_at', today())->count(),
            'today_completed' => Booking::where('status', 'Completed')
                                        ->whereDate('completed_at', today())
                                        ->count(),
            'today_revenue' => Booking::where('status', 'Completed')
                                      ->whereDate('completed_at', today())
                                      ->sum('total_amount'),

            // Technician stats
            'total_technicians' => Technician::count(),
            'available_technicians' => Technician::where('status', 'Available')->count(),
            'active_jobs' => Technician::sum('active_jobs'),

            // Inventory stats
            'total_items' => InventoryItem::count(),
            'low_stock_items' => InventoryItem::where('status', 'Low Stock')->count(),
            'out_of_stock_items' => InventoryItem::where('status', 'Out of Stock')->count(),

            // Customer stats
            'total_customers' => Customer::count(),
            'new_customers_this_month' => Customer::whereMonth('customer_since', now()->month)
                                                   ->whereYear('customer_since', now()->year)
                                                   ->count(),
        ];

        return response()->json($stats);
    }

    /**
     * Get date range report
     */
    public function getDateRangeReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $bookings = Booking::where('status', 'Completed')
                           ->whereBetween('completed_at', [$validated['start_date'], $validated['end_date']])
                           ->with(['customer', 'technician', 'bookingParts.inventoryItem'])
                           ->orderBy('completed_at', 'desc')
                           ->get();

        $summary = [
            'total_bookings' => $bookings->count(),
            'total_revenue' => $bookings->sum('total_amount'),
            'labor_revenue' => $bookings->sum('labor_cost'),
            'parts_revenue' => $bookings->sum('parts_cost'),
            'average_booking_value' => $bookings->avg('total_amount'),
            'bookings' => $bookings,
        ];

        return response()->json($summary);
    }
}
