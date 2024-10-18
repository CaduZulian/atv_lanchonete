<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomendasEnderecosTable extends Migration
{
    public function up()
    {
        Schema::create('encomendas_enderecos', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->foreignId('id_encomendas')->constrained('encomendas'); // Foreign Key
            $table->foreignId('id_enderecos')->constrained('enderecos'); // Foreign Key
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('encomendas_enderecos');
    }
}
