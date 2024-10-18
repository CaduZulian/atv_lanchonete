<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomendasTable extends Migration
{
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->foreignId('id_clientes')->constrained('clientes'); // Foreign Key
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('encomendas');
    }
}
