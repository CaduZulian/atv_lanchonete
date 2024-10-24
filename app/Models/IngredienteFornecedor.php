<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredienteFornecedor extends Model
{
    use HasFactory;

    protected $table = 'ingredientes_fornecedores';

    protected $fillable = ['id_ingrediente', 'id_fornecedor'];

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'id_ingrediente');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'id_fornecedor');
    }

    public function reposicoes()
    {
        return $this->hasMany(ReposicaoEstoque::class, 'id_ingrediente_fornecedor');
    }
}
?>