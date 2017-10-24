<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByandUpdatedByColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('total_cost');
            $table->integer('updated_by')->unsigned()->nullable()->after('total_cost');
        });

        Schema::table('rent_payments', function (Blueprint $table) {
            $table->integer('created_by')->unsigned()->nullable()->after('payment_amount');
            $table->integer('updated_by')->unsigned()->nullable()->after('payment_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
        Schema::table('rent_payments', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}
