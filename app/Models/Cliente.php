<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['nome_cliente'];

    public function telefones()
    {
        return $this->hasMany(ClienteTelefone::class, 'id_cliente');
    }

    public function enderecos()
    {
        return $this->hasMany(ClienteEndereco::class, 'id_cliente');
    }
}
?>