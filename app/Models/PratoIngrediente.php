<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PratoIngrediente extends Model
{
    use HasFactory;

    protected $table = 'pratos_ingredientes';

    protected $fillable = ['id_pratos', 'id_ingredientes'];

    public function prato()
    {
        return $this->belongsTo(Prato::class, 'id_pratos');
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'id_ingredientes');
    }
}
