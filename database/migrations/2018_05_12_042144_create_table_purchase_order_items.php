<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePurchaseOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseOrderItems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchaseId')->unsigned();
            $table->integer('itemId')->unsigned();
            $table->integer('unitId')->unsigned();
            $table->smallInteger('count')->unsigned();
            $table->double('purchaseItems', 16, 0)->unsigned();
            $table->foreign('purchaseId')->references('id')->on('purchaseOrders');
            $table->foreign('itemId')->references('id')->on('librarySkus');
            $table->foreign('unitId')->references('id')->on('units');
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
        Schema::dropIfExists('purchaseOrderItems');
    }
}
