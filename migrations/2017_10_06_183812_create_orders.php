<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id');
            $table->string('payment_status');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('tax_amount', 8, 2);
            $table->string('tax_type')->nullable();
            $table->decimal('total', 8, 2);
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
            ->dropIfExists(config('payments.table_suffix') . 'orders');
    }
}
