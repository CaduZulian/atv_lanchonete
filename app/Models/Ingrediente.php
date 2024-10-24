<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes';

    protected $fillable = ['nome_ingrediente', 'quantidade_ingrediente'];

    public function pratos()
    {
        return $this->hasMany(PratoIngrediente::class, 'id_ingrediente');
    }

    public function fornecedores()
    {
        return $this->hasMany(IngredienteFornecedor::class, 'id_ingrediente');
    }
}
?>