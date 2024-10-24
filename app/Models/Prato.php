<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    use HasFactory;

    protected $table = 'pratos';

    protected $fillable = ['nome_prato', 'valor'];

    public function encomendas()
    {
        return $this->hasMany(EncomendaPrato::class, 'id_prato');
    }

    public function ingredientes()
    {
        return $this->hasMany(PratoIngrediente::class, 'id_prato');
    }
}
?>