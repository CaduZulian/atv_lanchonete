<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $table = 'encomendas';

    protected $fillable = ['id_clientes'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clientes');
    }

    public function pratos()
    {
        return $this->hasMany(EncomendaPrato::class, 'id_encomendas');
    }

    public function endereco()
    {
        return $this->hasOne(EncomendaEndereco::class, 'id_encomendas');
    }
}
