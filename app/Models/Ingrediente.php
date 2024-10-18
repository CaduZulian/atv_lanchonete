<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes';

    protected $fillable = ['nome_ingrediente', 'quantidade_ingrediente', 'preco_ingrediente'];

    public function pratos()
    {
        return $this->belongsToMany(Prato::class, 'pratos_ingredientes', 'id_ingredientes', 'id_pratos');
    }

    public function reposicoes()
    {
        return $this->hasMany(ReposicaoEstoque::class, 'id_ingredientes');
    }
}
