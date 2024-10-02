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
        //Dentro de la migración, pongo los atributos que voy a utilizar
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('comment');
            $table->integer('raiting');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('o_id')->on('order')->cascadeOnDelete();
            $table->unsignedBigInteger('review_id');
            $table->foreign('review_id')->references('r_id')->on('review')->cascadeOnDelete();
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('ro_id')->on('route')->cascadeOnDelete();
            
        }
    );
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
