<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteTelefone extends Model
{
    use HasFactory;

    protected $table = 'cliente_telefone';

    protected $fillable = ['id_cliente', 'telefone_cliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
?>
