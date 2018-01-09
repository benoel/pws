<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_number', 30)->nullable();
            $table->integer('from_user')->unsigned()->nullable();
            $table->integer('to_user')->unsigned()->nullable();
            $table->integer('cost')->nullable();
            $table->timestamps();
        });
        Schema::create('devolution_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('devolution_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('devolution_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cost');
            $table->timestamps();
        });
        Schema::create('other_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_number', 30)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->string('note')->nullable();
            $table->integer('cost')->nullable();
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
        Schema::dropIfExists('devolutions');
        Schema::dropIfExists('devolution_costs');
        Schema::dropIfExists('devolution_details');
        Schema::dropIfExists('other_transactions');
    }
}
