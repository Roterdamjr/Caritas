<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'data_nascimento',
        'nome_responsavel',
        'parentesco_responsavel'
    ];

    public function candidato()
    {
        return $this->hasOne(Candidato::class);
    }

    public function contato()
    {
        return $this->hasOne(Contato::class);
    }

}
