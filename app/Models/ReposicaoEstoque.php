<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReposicaoEstoque extends Model
{
    use HasFactory;

    protected $table = 'reposicao_estoque';

    protected $fillable = ['nota_fiscal', 'id_ingrediente_fornecedor', 'data_compra', 'valor_ingrediente', 'quantidade'];

    public function ingredienteFornecedor()
    {
        return $this->belongsTo(IngredienteFornecedor::class, 'id_ingrediente_fornecedor');
    }
}
?>