<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $table = 'comandes';

    // Afegeix aquesta línia
    protected $fillable = ['usuari_id', 'producte', 'quantitat'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuari_id');
    }
}
