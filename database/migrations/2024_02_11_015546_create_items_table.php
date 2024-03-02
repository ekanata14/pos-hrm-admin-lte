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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id_item');
            $table->string('name_item');
            $table->integer('base_price_item');
            $table->integer('sell_price_item');
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('categories')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_supplier');
            $table->foreign('id_supplier')->references('id_supplier')->on('suppliers')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
