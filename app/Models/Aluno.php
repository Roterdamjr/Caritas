<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $guarded = [];
/*
    protected $fillable = [
        'atividade', 
        'atividade_dia_semana',
        'atividade_turno',
        'atividade_horario',
        'comunidade',
        'profissao',
        'escolaridade',

    ];
*/
    protected $casts = ['uniformes'=>'array'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function contato()
    {
        return $this->hasOneThrough(Contato::class, Pessoa::class, 'id', 'pessoa_id', 'pessoa_id', 'id');
    }
}
