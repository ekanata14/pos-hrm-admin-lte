<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id_checkout');
            $table->unsignedInteger('id_cart');
            $table->foreign('id_cart')->references('id_cart')->on('carts')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('total');
            $table->string('payment_method');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('date_checkout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
