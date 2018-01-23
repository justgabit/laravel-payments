<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('referral_code');
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
            ->dropIfExists(config('payments.table_suffix') . 'partners');
    }
}
