<?php

namespace App\Http\Controllers;

use App\Models\LaborCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Display settings page
     */
    public function index()
    {
        $laborCosts = LaborCost::all();
        return view('admin.settings', compact('laborCosts'));
    }

    /**
     * Get current labor costs
     */
    public function getLaborCosts()
    {
        $costs = LaborCost::orderBy('service_type')->get();
        return response()->json($costs);
    }

    /**
     * Update labor cost for a service type
     */
    public function updateLaborCost(Request $request, $id)
    {
        $validated = $request->validate([
            'cost' => 'required|numeric|min:0',
            'modified_by' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $laborCost = LaborCost::findOrFail($id);

            // Store previous cost in history
            $laborCost->previous_cost = $laborCost->cost;
            $laborCost->cost = $validated['cost'];
            $laborCost->effective_date = now();
            $laborCost->modified_by = $validated['modified_by'];
            $laborCost->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Labor cost updated successfully',
                'laborCost' => $laborCost
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update labor cost: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get price change history
     */
    public function getPriceHistory()
    {
        $history = LaborCost::orderBy('effective_date', 'desc')
                            ->limit(50)
                            ->get();

        return response()->json($history);
    }

    /**
     * Get specific service type cost
     */
    public function getServiceTypeCost($serviceType)
    {
        $cost = LaborCost::where('service_type', $serviceType)->first();

        if (!$cost) {
            return response()->json([
                'success' => false,
                'message' => 'Service type not found'
            ], 404);
        }

        return response()->json($cost);
    }
}
