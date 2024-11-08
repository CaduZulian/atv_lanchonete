<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER DiminuirEstoqueAposPedido
            AFTER INSERT ON encomendas_prato
            FOR EACH ROW
            BEGIN
                UPDATE ingredientes AS i
                JOIN pratos_ingredientes AS pi ON pi.id_ingrediente = i.id
                SET i.quantidade_ingrediente = i.quantidade_ingrediente - NEW.quantidade
                WHERE pi.id_prato = NEW.id_prato;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS DiminuirEstoqueAposPedido');
    }
};
