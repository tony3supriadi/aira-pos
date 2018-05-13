<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLibraryStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraryStocks', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('stockLast')->unsigned();
            $table->smallInteger('stockPurchase')->unsigned();
            $table->smallInteger('stockSales')->unsigned();
            $table->smallInteger('inStock')->unsigned();
            $table->foreign('id')->references('id')->on('librarySkus');
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
        Schema::dropIfExists('libraryStocks');
    }
}
