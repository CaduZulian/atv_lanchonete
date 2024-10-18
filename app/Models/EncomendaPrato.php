<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncomendaPrato extends Model
{
    use HasFactory;

    protected $table = 'encomendas_prato';

    protected $fillable = ['id_encomendas', 'id_pratos', 'quantidade_pratos', 'preco_total', 'data_encomendas'];

    public function encomenda()
    {
        return $this->belongsTo(Encomenda::class, 'id_encomendas');
    }

    public function prato()
    {
        return $this->belongsTo(Prato::class, 'id_pratos');
    }
}
