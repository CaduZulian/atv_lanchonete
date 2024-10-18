<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePratosTable extends Migration
{
    public function up()
    {
        Schema::create('pratos', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->string('nome_pratos', 100);
            $table->decimal('valor', 10, 2);
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pratos');
    }
}
