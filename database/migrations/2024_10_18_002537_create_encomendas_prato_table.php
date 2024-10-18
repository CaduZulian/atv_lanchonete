<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomendasPratoTable extends Migration
{
    public function up()
    {
        Schema::create('encomendas_prato', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->foreignId('id_encomendas')->constrained('encomendas'); // Foreign Key
            $table->foreignId('id_pratos')->constrained('pratos'); // Foreign Key
            $table->integer('quantidade_pratos');
            $table->integer('preco_total');
            $table->date('data_encomendas');
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('encomendas_prato');
    }
}
