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
        Schema::create('labor_costs', function (Blueprint $table) {
            $table->id();
            $table->enum('service_type', ['Repair', 'Installation', 'Maintenance']);
            $table->decimal('cost', 8, 2);
            $table->decimal('previous_cost', 8, 2)->nullable();
            $table->date('effective_date');
            $table->string('modified_by')->default('Admin User');
            $table->timestamps();

            // Index
            $table->index('service_type');
            $table->index('effective_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labor_costs');
    }
};
