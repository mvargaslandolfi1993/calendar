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
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('next_user_plan_id')->nullable();
            $table->date('start_timestamp')->nullable();
            $table->date('end_timestamp')->nullable();
            $table->date('renewal_timestamp')->nullable();
            $table->float('renewal_price');
            $table->boolean('requires_invoice');
            $table->integer('status');
            $table->float('financiation');
            $table->integer('status_financiation');
            $table->string('language');
            $table->string('nif')->nullable();
            $table->string('business_name')->nullable();
            $table->boolean('pending_payment');
            $table->date('date_max_payment')->nullable();
            $table->date('proxim_start_timestamp')->nullable();
            $table->date('proxim_end_timestamp')->nullable();
            $table->date('proxim_renewal_timestamp')->nullable();
            $table->date('proxim_renewal_price')->nullable();
            $table->float('credits_return')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->integer('cancel_employee')->nullable();
            $table->integer('force_renovation')->nullable();
            $table->date('date_canceled')->nullable();
            $table->float('amount_confirm_canceled')->nullable();
            $table->float('credit_confirm_canceled')->nullable();
            $table->unsignedInteger('cost_center_id')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamp('modified')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('currency_id')->references('id')->on('currencies');

        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_plans');
    }
};
