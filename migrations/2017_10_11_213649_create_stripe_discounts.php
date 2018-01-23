<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripeDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'stripe_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_id');
            $table->unsignedInteger('created');
            $table->string('currency')->nullable();
            $table->string('duration')->nullable();
            $table->unsignedSmallInteger('duration_in_months')->nullable();
            $table->boolean('livemode');
            $table->unsignedSmallInteger('max_redemptions')->nullable();
            $table->text('metadata')->nullable();
            $table->unsignedSmallInteger('percent_off')->nullable();
            $table->unsignedInteger('redeem_by')->nullable();
            $table->unsignedSmallInteger('times_redeeme')->nullable();
            $table->boolean('valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(config('payments.model_connection'))
            ->dropIfExists(config('payments.table_suffix') . 'stripe_discounts');
    }
}
