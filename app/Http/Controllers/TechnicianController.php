<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display all technicians
     */
    public function index()
    {
        $technicians = Technician::orderBy('name')->get();
        return view('admin.technicians', compact('technicians'));
    }

    /**
     * Get available technicians for assignment
     */
    public function getAvailable($appliance = null)
    {
        $query = Technician::where('status', 'Available');

        if ($appliance) {
            $query->whereJsonContains('specializations', $appliance);
        }

        $technicians = $query->orderBy('active_jobs')->get();

        return response()->json($technicians);
    }

    /**
     * Show technician details
     */
    public function show($id)
    {
        $technician = Technician::findOrFail($id);

        // If request expects JSON (API call), return JSON
        if (request()->wantsJson() || request()->is('api/*')) {
            return response()->json($technician);
        }

        // Otherwise return view with completed bookings
        $technician->load(['completedBookings' => function($query) {
            $query->orderBy('completed_at', 'desc')->limit(10);
        }]);

        return view('admin.technician-detail', compact('technician'));
    }

    /**
     * Store new technician
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'address' => 'required|string',
            'specializations' => 'required|array',
            'status' => 'required|in:Available,Off Duty',
            'date_hired' => 'required|date',
        ]);

        $technician = Technician::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Technician added successfully',
            'technician' => $technician
        ]);
    }

    /**
     * Update technician
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'phone' => 'string|max:20',
            'email' => 'nullable|email',
            'address' => 'string',
            'specializations' => 'array',
            'status' => 'in:Available,Off Duty,On Job',
            'date_hired' => 'date',
        ]);

        $technician = Technician::findOrFail($id);
        $technician->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Technician updated successfully',
            'technician' => $technician
        ]);
    }

    /**
     * Delete technician
     */
    public function destroy($id)
    {
        $technician = Technician::findOrFail($id);

        // Check if technician has active bookings
        if ($technician->active_jobs > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete technician with active jobs'
            ], 400);
        }

        $technician->delete();

        return response()->json([
            'success' => true,
            'message' => 'Technician deleted successfully'
        ]);
    }

    /**
     * Get technician statistics
     */
    public function getStats()
    {
        $stats = [
            'total' => Technician::count(),
            'available' => Technician::where('status', 'Available')->count(),
            'off_duty' => Technician::where('status', 'Off Duty')->count(),
            'active_jobs' => Technician::sum('active_jobs'),
        ];

        return response()->json($stats);
    }
}
