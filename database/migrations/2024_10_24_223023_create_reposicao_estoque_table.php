<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reposicao_estoque', function (Blueprint $table) {
            $table->id();
            $table->string('nota_fiscal', 50);
            $table->unsignedBigInteger('id_ingrediente_fornecedor');
            $table->date('data_compra');
            $table->decimal('valor_ingrediente', 10, 2);
            $table->integer('quantidade');
            $table->timestamps();
    
            $table->foreign('id_ingrediente_fornecedor')->references('id')->on('ingredientes_fornecedores')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reposicao_estoque');
    }
    
};
