<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReposicaoEstoqueTable extends Migration
{
    public function up()
    {
        Schema::create('reposicao_estoque', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->foreignId('id_fornecedores')->constrained('fornecedores'); // Foreign Key
            $table->foreignId('id_ingredientes')->constrained('ingredientes'); // Foreign Key
            $table->date('data_compra');
            $table->string('nota_fiscal', 50);
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('reposicao_estoque');
    }
}
