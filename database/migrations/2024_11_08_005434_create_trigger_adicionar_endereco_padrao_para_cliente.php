<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER AdicionarEnderecoPadraoParaCliente
            AFTER INSERT ON clientes
            FOR EACH ROW
            BEGIN
                DECLARE defaultAddressId INT;

                INSERT INTO enderecos (rua, bairro, numero_casa, cidade, created_at, updated_at)
                VALUES ("Consumo no Local", "Lanchonete", 0, "Local", NOW(), NOW());
                
                SET defaultAddressId = LAST_INSERT_ID();
                
                INSERT INTO clientes_enderecos (id_cliente, id_endereco)
                VALUES (NEW.id, defaultAddressId);
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS AdicionarEnderecoPadraoParaCliente');
    }
};
