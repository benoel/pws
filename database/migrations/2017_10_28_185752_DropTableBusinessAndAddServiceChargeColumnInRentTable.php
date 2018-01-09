<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableBusinessAndAddServiceChargeColumnInRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('businesses');
        Schema::table('rents', function (Blueprint $table) {
            $table->integer('service_charge')->nullable()->after('rent_length');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->nullable();
            $table->timestamps();
        });
        Schema::table('rents', function (Blueprint $table) {
            $table->dropColumn('service_charge');
        });
    }
}
