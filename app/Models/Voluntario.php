<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    use HasFactory;

    //indica que qualer campo pode ser atualizado
    protected $guarded = [];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function contato()
    {
        return $this->hasOneThrough(Contato::class, Pessoa::class, 'id', 'pessoa_id', 'pessoa_id', 'id');
    }

}
