<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['nome_cliente', 'telefone'];

    public function encomendas()
    {
        return $this->hasMany(Encomenda::class, 'id_clientes');
    }
}
