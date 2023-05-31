<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_part_service_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_part_id');
            $table->unsignedBigInteger('service_order_id');

            $table->foreign('car_part_id')->references('id')->on('car_parts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('service_order_id')->references('id')->on('service_orders')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_part_service_order');
    }
};
