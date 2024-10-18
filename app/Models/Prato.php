<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    use HasFactory;

    protected $table = 'pratos';

    protected $fillable = ['nome_pratos', 'valor'];

    public function encomendas()
    {
        return $this->hasMany(EncomendaPrato::class, 'id_pratos');
    }

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'pratos_ingredientes', 'id_pratos', 'id_ingredientes');
    }
}
