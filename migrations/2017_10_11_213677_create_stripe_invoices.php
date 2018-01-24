<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripeInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('payments.model_connection'))
            ->create(config('payments.table_suffix') . 'stripe_invoices', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedInteger('order_id');
            $table->decimal('amount_due', 8, 2)->nullable();
            $table->boolean('attempted')->nullable();
            $table->boolean('closed')->nullable();
            $table->unsignedInteger('date')->nullable();
            $table->text('description')->nullable();
            $table->boolean('paid')->nullable();
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('tax', 8, 2)->nullable();
            $table->smallInteger('tax_percent')->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on(config('payments.table_suffix') . 'orders')
                ->onUpdate('restrict')
                ->onCascade('restrict');
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
            ->dropIfExists(config('payments.table_suffix') . 'stripe_invoices');
    }
}
