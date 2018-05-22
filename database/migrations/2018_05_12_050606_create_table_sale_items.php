<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSaleItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleItems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('saleId')->unsigned();
            $table->integer('itemId')->unsigned();
            $table->integer('unitId')->unsigned();
            $table->smallInteger('count')->unsigned();
            $table->double('price', 16, 0)->unsigned();
            $table->double('saleItem', 16, 0)->unsigned();
            $table->foreign('saleId')->references('id')->on('sales');
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
        Schema::dropIfExists('saleItems');
    }
}
