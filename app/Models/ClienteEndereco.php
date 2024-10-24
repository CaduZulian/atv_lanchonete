<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteEndereco extends Model
{
    use HasFactory;

    protected $table = 'clientes_enderecos';

    protected $fillable = ['id_cliente', 'id_endereco'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'id_endereco');
    }

    public function encomendas()
    {
        return $this->hasMany(Encomenda::class, 'id_cliente_endereco');
    }
}
?>
