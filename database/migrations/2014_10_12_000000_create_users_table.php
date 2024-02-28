<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable(); 
            $table->string("phone_number");
            $table->unsignedInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('roles')->constrained();
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
};
