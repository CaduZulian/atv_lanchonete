<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_ingrediente', 100);
            $table->integer('quantidade_ingrediente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredientes');
    }

};
