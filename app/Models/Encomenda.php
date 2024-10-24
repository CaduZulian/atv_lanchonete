<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $table = 'encomendas';

    protected $fillable = ['id_cliente_endereco', 'data_encomenda'];

    public function clienteEndereco()
    {
        return $this->belongsTo(ClienteEndereco::class, 'id_cliente_endereco');
    }

    public function pratos()
    {
        return $this->hasMany(EncomendaPrato::class, 'id_encomenda');
    }
}?>
