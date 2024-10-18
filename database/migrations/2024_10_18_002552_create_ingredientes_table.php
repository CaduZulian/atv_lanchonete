<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesTable extends Migration
{
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->string('nome_ingrediente', 100);
            $table->integer('quantidade_ingrediente');
            $table->integer('preco_ingrediente');
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredientes');
    }
}
