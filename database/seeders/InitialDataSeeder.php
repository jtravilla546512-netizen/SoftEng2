<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Labor Costs
        DB::table('labor_costs')->insert([
            [
                'service_type' => 'Repair',
                'cost' => 80.00,
                'previous_cost' => null,
                'effective_date' => Carbon::now(),
                'modified_by' => 'System',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'service_type' => 'Installation',
                'cost' => 150.00,
                'previous_cost' => null,
                'effective_date' => Carbon::now(),
                'modified_by' => 'System',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'service_type' => 'Maintenance',
                'cost' => 60.00,
                'previous_cost' => null,
                'effective_date' => Carbon::now(),
                'modified_by' => 'System',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed Technicians
        DB::table('technicians')->insert([
            [
                'name' => 'James Caraan',
                'phone' => '+63912-345-6789',
                'email' => 'james.caraan@example.com',
                'address' => 'Barangay 1-A, Tuguegarao City',
                'specializations' => json_encode(['Aircon', 'Refrigerator']),
                'status' => 'Available',
                'jobs_completed' => 127,
                'active_jobs' => 3,
                'average_rating' => 4.8,
                'total_revenue' => 28575.00,
                'date_hired' => '2024-01-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'GB Labrador',
                'phone' => '+63912-345-6790',
                'email' => 'gb.labrador@example.com',
                'address' => 'Barangay 2-A, Tuguegarao City',
                'specializations' => json_encode(['Aircon', 'Refrigerator']),
                'status' => 'Available',
                'jobs_completed' => 98,
                'active_jobs' => 2,
                'average_rating' => 4.6,
                'total_revenue' => 22100.00,
                'date_hired' => '2024-03-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nonong Balinan',
                'phone' => '+63912-345-6791',
                'email' => 'nonong.balinan@example.com',
                'address' => 'Barangay 3-A, Tuguegarao City',
                'specializations' => json_encode(['Aircon']),
                'status' => 'Available',
                'jobs_completed' => 85,
                'active_jobs' => 1,
                'average_rating' => 4.5,
                'total_revenue' => 19250.00,
                'date_hired' => '2024-05-10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ryan Rems',
                'phone' => '+63912-345-6792',
                'email' => 'ryan.rems@example.com',
                'address' => 'Barangay 4-A, Tuguegarao City',
                'specializations' => json_encode(['Refrigerator']),
                'status' => 'Off Duty',
                'jobs_completed' => 72,
                'active_jobs' => 0,
                'average_rating' => 4.4,
                'total_revenue' => 16200.00,
                'date_hired' => '2024-06-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Muman Reyes',
                'phone' => '+63912-345-6793',
                'email' => 'muman.reyes@example.com',
                'address' => 'Barangay 5-A, Tuguegarao City',
                'specializations' => json_encode(['Aircon', 'Refrigerator']),
                'status' => 'Available',
                'jobs_completed' => 65,
                'active_jobs' => 1,
                'average_rating' => 4.3,
                'total_revenue' => 14625.00,
                'date_hired' => '2024-08-01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Seed Sample Inventory Items
        DB::table('inventory_items')->insert([
            // Aircon Spare Parts
            [
                'item_code' => 'AC-COMP-001',
                'name' => 'Aircon Compressor',
                'brand' => 'Samsung',
                'category' => 'Aircon Spare Parts',
                'description' => '1HP Compressor for split type aircon',
                'quantity' => 10,
                'reorder_point' => 3,
                'cost_price' => 3500.00,
                'selling_price' => 4200.00,
                'status' => 'In Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_code' => 'AC-FAN-001',
                'name' => 'Aircon Fan Motor',
                'brand' => 'LG',
                'category' => 'Aircon Spare Parts',
                'description' => 'Indoor fan motor',
                'quantity' => 15,
                'reorder_point' => 5,
                'cost_price' => 850.00,
                'selling_price' => 1100.00,
                'status' => 'In Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_code' => 'AC-CAP-001',
                'name' => 'Capacitor',
                'brand' => 'Generic',
                'category' => 'Aircon Spare Parts',
                'description' => '35uF running capacitor',
                'quantity' => 25,
                'reorder_point' => 10,
                'cost_price' => 120.00,
                'selling_price' => 180.00,
                'status' => 'In Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Refrigerator Spare Parts
            [
                'item_code' => 'REF-THERM-001',
                'name' => 'Thermostat',
                'brand' => 'Carrier',
                'category' => 'Refrigerator Spare Parts',
                'description' => 'Universal refrigerator thermostat',
                'quantity' => 20,
                'reorder_point' => 5,
                'cost_price' => 450.00,
                'selling_price' => 650.00,
                'status' => 'In Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_code' => 'REF-COMP-001',
                'name' => 'Refrigerator Compressor',
                'brand' => 'Samsung',
                'category' => 'Refrigerator Spare Parts',
                'description' => '1/6HP compressor',
                'quantity' => 8,
                'reorder_point' => 3,
                'cost_price' => 2800.00,
                'selling_price' => 3500.00,
                'status' => 'In Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Aircon Units
            [
                'item_code' => 'AC-UNIT-WIN-1HP',
                'name' => 'Window Type Aircon 1HP',
                'brand' => 'Carrier',
                'category' => 'Aircon Units',
                'description' => 'Brand new window type 1HP',
                'quantity' => 5,
                'reorder_point' => 2,
                'cost_price' => 12000.00,
                'selling_price' => 15000.00,
                'status' => 'In Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_code' => 'AC-UNIT-SPLIT-1HP',
                'name' => 'Split Type Aircon 1HP',
                'brand' => 'Daikin',
                'category' => 'Aircon Units',
                'description' => 'Brand new split type 1HP inverter',
                'quantity' => 3,
                'reorder_point' => 2,
                'cost_price' => 18000.00,
                'selling_price' => 22000.00,
                'status' => 'Low Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Refrigerator Units
            [
                'item_code' => 'REF-UNIT-SINGLE',
                'name' => 'Single Door Refrigerator',
                'brand' => 'Samsung',
                'category' => 'Refrigerator Units',
                'description' => '5.5 cubic feet single door',
                'quantity' => 4,
                'reorder_point' => 2,
                'cost_price' => 8000.00,
                'selling_price' => 10500.00,
                'status' => 'Low Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_code' => 'REF-UNIT-DOUBLE',
                'name' => 'Double Door Refrigerator',
                'brand' => 'LG',
                'category' => 'Refrigerator Units',
                'description' => '16 cubic feet double door inverter',
                'quantity' => 2,
                'reorder_point' => 1,
                'cost_price' => 22000.00,
                'selling_price' => 28000.00,
                'status' => 'Low Stock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        echo "✅ Initial data seeded successfully!\n";
        echo "   - 3 Labor cost entries\n";
        echo "   - 5 Technicians\n";
        echo "   - 9 Inventory items\n";
    }
}
