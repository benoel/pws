<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('email', 60)->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone_number', 13)->nullable();
            $table->string('company', 60)->nullable();
            $table->string('identity_card_number', 50)->nullable();
            $table->string('npwp', 50)->nullable();
            $table->integer('business_field_id')->unsigned()->nullable();
            $table->integer('role')->default(0);
            $table->string('api_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
