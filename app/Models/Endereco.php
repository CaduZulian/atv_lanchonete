<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = ['rua', 'bairro', 'numero_casa', 'cidade'];

    public function clientes()
    {
        return $this->hasMany(ClienteEndereco::class, 'id_endereco');
    }
}
?>