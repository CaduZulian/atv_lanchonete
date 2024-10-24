<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncomendaPrato extends Model
{
    use HasFactory;
    
    protected $table = 'encomendas_prato';

    protected $fillable = ['id_encomenda', 'id_prato', 'quantidade'];

    public function encomenda()
    {
        return $this->belongsTo(Encomenda::class, 'id_encomenda');
    }

    public function prato()
    {
        return $this->belongsTo(Prato::class, 'id_prato');
    }
}
?>