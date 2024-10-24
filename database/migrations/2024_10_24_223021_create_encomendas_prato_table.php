<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('encomendas_prato', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_encomenda');
            $table->unsignedBigInteger('id_prato');
            $table->integer('quantidade');
            $table->timestamps();
    
            $table->foreign('id_encomenda')->references('id')->on('encomendas')->onDelete('cascade');
            $table->foreign('id_prato')->references('id')->on('pratos')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('encomendas_prato');
    }
    
};
