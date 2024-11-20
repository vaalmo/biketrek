<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() 
    { 
        Schema::table('custom_users', function (Blueprint $table) { 
            $table->string('role')->default('client'); 
            $table->integer('balance'); 
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down() 
    { 
        Schema::table('custom_users', function (Blueprint $table) { 
            $table->dropColumn(['role']); 
            $table->dropColumn(['balance']); 
        }); 
    } 
};
