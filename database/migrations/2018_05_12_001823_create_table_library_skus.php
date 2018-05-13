<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLibrarySkus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librarySkus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('itemId')->unsigned();
            $table->integer('unitId')->unsigned();
            $table->string('sku', 16)->unique();
            $table->string('name');
            $table->double('price', 16, 0)->unsigned();
            $table->tinyInteger('discount')->unsigned();
            $table->foreign('itemId')->references('id')->on('libraryItems');
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
        Schema::dropIfExists('librarySkus');
    }
}
