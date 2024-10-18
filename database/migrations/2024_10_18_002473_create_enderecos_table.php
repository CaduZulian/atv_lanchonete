<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id(); // Primary Key with auto-increment
            $table->string('rua', 100);
            $table->string('bairro', 30);
            $table->integer('numero_casa');
            $table->string('cidade', 100);
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
