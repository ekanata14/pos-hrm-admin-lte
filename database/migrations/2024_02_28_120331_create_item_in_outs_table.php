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
        Schema::create('item_in_outs', function (Blueprint $table) {
            $table->increments('id_item_in_out');
            $table->unsignedInteger('id_cart')->nullable();
            $table->foreign('id_cart')->references('id_cart')->on('carts')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_item');
            $table->foreign('id_item')->references('id_item')->on('items')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('item_in');
            $table->integer('item_out');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('item_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_in_outs');
    }
};
