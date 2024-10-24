<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ingredientes_fornecedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ingrediente');
            $table->unsignedBigInteger('id_fornecedor');
            $table->timestamps();
    
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
            $table->foreign('id_fornecedor')->references('id')->on('fornecedores')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ingredientes_fornecedores');
    }
    
};
