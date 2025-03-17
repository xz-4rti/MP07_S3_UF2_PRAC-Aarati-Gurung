<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $fillable = ['usuari_id'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class);
    }
}
