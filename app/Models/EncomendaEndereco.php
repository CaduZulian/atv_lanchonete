<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncomendaEndereco extends Model
{
    use HasFactory;

    protected $table = 'encomendas_enderecos';

    protected $fillable = ['id_encomendas', 'id_enderecos'];

    public function encomenda()
    {
        return $this->belongsTo(Encomenda::class, 'id_encomendas');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'id_enderecos');
    }
}
