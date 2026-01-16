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
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code', 50)->unique();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('image')->nullable();
            $table->enum('category', [
                'Aircon Spare Parts',
                'Refrigerator Spare Parts',
                'Aircon Units',
                'Refrigerator Units',
                'Aircon Unit',
                'Spare Parts',
                'Refrigerator Unit'
            ]);
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('reorder_point')->default(5);
            $table->decimal('cost_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->enum('status', ['In Stock', 'Low Stock', 'Out of Stock'])->default('In Stock');
            $table->timestamps();

            // Indexes
            $table->index('category');
            $table->index('status');
            $table->index('item_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_items');
    }
};
