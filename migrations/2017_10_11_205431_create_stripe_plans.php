<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripePlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'stripe_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscription_id')->unique();
            $table->string('plan_id');
            $table->timestamps();

            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
            ->dropIfExists(config('payments.table_suffix') . 'stripe_plans');
    }
}
