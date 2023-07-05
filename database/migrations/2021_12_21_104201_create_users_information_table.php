<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->id()->from(500);
            $table->integer('facility');
            $table->string('name')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->dateTime('lastlogin')->nullable();
            $table->dateTime('lastactivity')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('users_information');
    }
}
