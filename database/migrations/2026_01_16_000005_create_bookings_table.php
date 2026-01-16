<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number', 20)->unique();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('technician_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('appliance', ['Aircon', 'Refrigerator']);
            $table->enum('service_type', ['Repair', 'Installation', 'Maintenance']);
            $table->text('issue_description')->nullable();
            $table->string('location');
            $table->date('service_date');
            $table->time('service_time');
            $table->enum('status', ['Pending', 'Assigned', 'Completed', 'Cancelled'])->default('Pending');
            $table->decimal('labor_cost', 8, 2)->default(0);
            $table->decimal('parts_cost', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('booking_number');
            $table->index('status');
            $table->index('service_date');
            $table->index('customer_id');
            $table->index('technician_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
