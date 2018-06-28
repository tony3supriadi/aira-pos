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
            $table->string('sku', 16)->unique();
            $table->string('name');
            $table->double('buyPrice')->unsigned()->nullable();
            $table->double('price', 16, 0)->unsigned()->nullable();
            $table->tinyInteger('discount')->unsigned()->nullable();
            $table->foreign('itemId')->references('id')->on('libraryItems');
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
