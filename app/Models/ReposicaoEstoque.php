<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReposicaoEstoque extends Model
{
    use HasFactory;

    protected $table = 'reposicao_estoque';

    protected $fillable = ['id_fornecedores', 'id_ingredientes', 'data_compra', 'nota_fiscal'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'id_fornecedores');
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'id_ingredientes');
    }
}
