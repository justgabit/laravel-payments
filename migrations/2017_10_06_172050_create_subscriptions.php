<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('currency');
            $table->integer('bill_cycle_months');
            $table->boolean('is_addon');
            $table->integer('trial_days');
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
            ->dropIfExists(config('payments.table_suffix') . 'subscriptions');
    }
}
