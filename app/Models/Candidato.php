<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

//indica que qualer campo pode ser atualizado
    protected $guarded = [];

        //  cast de String para Array, já que o formula´rio manda String
    protected $casts = ['atividades'=>'array'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function contato()
    {
        return $this->hasOneThrough(Contato::class, Pessoa::class, 'id', 'pessoa_id', 'pessoa_id', 'id');
    }
}
