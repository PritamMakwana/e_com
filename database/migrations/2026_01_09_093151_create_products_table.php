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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->string('weight')->nullable();

            $table->enum('stock_status', ['in_stock', 'out_of_stock'])->default('in_stock');

            $table->unsignedTinyInteger('rating')->default(5);

            $table->string('image');

            $table->boolean('is_visible')->default(1);
            $table->boolean('is_deal')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_discount')->default(0);
            $table->boolean('is_best_selling')->default(0);
            $table->boolean('is_trending')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
