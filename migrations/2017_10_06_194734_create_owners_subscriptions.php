<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'owners_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('owner_id');
            $table->unsignedInteger('subscription_id');
            $table->string('name');
            $table->decimal('amount', 8, 2);
            $table->dateTime('expiration_date');
            $table->timestamps();

            $table->foreign('owner_id')
                ->references('id')
                ->on('owners')
                ->onDelete('restrict')
                ->onUpdate('restrict');

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
            ->dropIfExists(config('payments.table_suffix') . 'owners_subscriptions');
    }
}
