<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente_endereco');
            $table->date('data_encomenda');
            $table->timestamps();

            $table->foreign('id_cliente_endereco')->references('id')->on('clientes_enderecos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('encomendas');
    }

};
