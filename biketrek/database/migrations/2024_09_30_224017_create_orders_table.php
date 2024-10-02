<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear tabla de órdenes
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con usuario
            $table->string('status')->default('Pendiente'); // Estado de la orden
            $table->string('address'); 
            $table->decimal('total', 8, 2)->default(0);
            $table->timestamps(); 
        });

        // Crear tabla pivote order_product
        Schema::create('order_product', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Relación con la orden
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relación con el producto
            $table->integer('quantity'); // Cantidad del producto
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar tablas si se revierten las migraciones
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
}
