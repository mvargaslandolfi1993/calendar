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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('external_budget_id');
            $table->string('external_route_id');
            $table->unsignedInteger('track_id')->nullable();
            $table->string('name')->nullable();
            $table->string('notes')->nullable();
            $table->timestamp('timestamp');
            $table->string('arrival_address');
            $table->timestamp('arrival_timestamp');
            $table->string('departure_address');
            $table->timestamp('departure_timestamp');
            $table->integer('capacity');
            $table->integer('confirmed_pax_count');
            $table->timestamp('reported_departure_timestamp')->nullable();
            $table->string('reported_departure_kms')->nullable();
            $table->timestamp('reported_arrival_timestamp')->nullable();
            $table->string('reported_arrival_kms')->nullable();
            $table->string('reported_vehicle_plate_number')->nullable();
            $table->integer('status');
            $table->json('status_info');
            $table->boolean('reprocess_status')->default(0);
            $table->boolean('return')->default(0);
            $table->boolean('synchronized_downstream')->nullable();
            $table->boolean('synchronized_upstream')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->integer('sale_tickets_drivers')->default(0);
            $table->string('notes_drivers')->nullable();
            $table->text('itinerary_drivers');
            $table->boolean('cost_if_externalized')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamp('modified')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
