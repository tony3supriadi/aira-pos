<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruleId')->unsigned();
            $table->string('nik')->unique();
            $table->string('password');
            $table->string('firstName', 64);
            $table->string('lastName', 64)->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('email', 128)->nullable();
            $table->text('note')->nullable();
            $table->foreign('ruleId')->references('id')->on('rules');
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
        Schema::dropIfExists('employees');
    }
}
