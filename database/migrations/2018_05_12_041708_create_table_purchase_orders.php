<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePurchaseOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseOrders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplierId')->unsigned();
            $table->text('note');
            $table->double('totalPrice', 16, 0);
            $table->enum('status', ['PayOut', 'Panding']);
            $table->foreign('supplierId')->references('id')->on('suppliers');
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
        Schema::dropIfExists('purchaseOrders');
    }
}
