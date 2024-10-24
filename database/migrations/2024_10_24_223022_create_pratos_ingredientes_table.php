<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pratos_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prato');
            $table->unsignedBigInteger('id_ingrediente');
            $table->timestamps();
    
            $table->foreign('id_prato')->references('id')->on('pratos')->onDelete('cascade');
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pratos_ingredientes');
    }
    
};
