<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersStripeSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'owners_stripe_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id');
            $table->string('customer_id');
            $table->string('subscription_id');
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
            ->dropIfExists(config('payments.table_suffix') . 'owners_stripe_subscriptions');
    }
}
