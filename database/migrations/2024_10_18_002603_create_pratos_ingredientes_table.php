<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePratosIngredientesTable extends Migration
{
    public function up()
    {
        Schema::create('pratos_ingredientes', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->foreignId('id_pratos')->constrained('pratos'); // Foreign Key
            $table->foreignId('id_ingredientes')->constrained('ingredientes'); // Foreign Key
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pratos_ingredientes');
    }
}
