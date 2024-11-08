<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER IncrementarEstoqueAposReposicao
            AFTER INSERT ON reposicao_estoque
            FOR EACH ROW
            BEGIN
                UPDATE ingredientes
                SET quantidade_ingrediente = quantidade_ingrediente + NEW.quantidade
                WHERE id = (SELECT id_ingrediente FROM ingredientes_fornecedores WHERE id = NEW.id_ingrediente_fornecedor);
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS IncrementarEstoqueAposReposicao');
    }
};
