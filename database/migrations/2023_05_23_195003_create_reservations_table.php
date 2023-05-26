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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_plan_id');
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('track_id')->nullable();
            $table->timestamp('reservation_start');
            $table->timestamp('reservation_end');
            $table->unsignedBigInteger('route_stop_origin_id');
            $table->unsignedBigInteger('route_stop_destination_id');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('user_plan_id')->references('id')->on('user_plans');
            $table->foreign('route_id')->references('id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
