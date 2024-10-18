<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = ['nome_fornecedor', 'valor_ingrediente'];

    public function reposicoes()
    {
        return $this->hasMany(ReposicaoEstoque::class, 'id_fornecedores');
    }
}
