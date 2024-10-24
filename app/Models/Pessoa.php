<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    //indica que qualer campo pode ser atualizado
    protected $guarded = [];
    
    protected $fillable = [
        'nome', 
        'data_nascimento',
        'nome_responsavel',
        'parentesco_responsavel',
        'telefone_repsonsavel',
        'rg',
        'orgao_emissor',
        'cpf',
        'nacionalidade',
        'estado_civil',
        'sexo'
    ];

    public function voluntario()
    {
        return $this->hasOne(Voluntario::class);
    }

    public function contato()
    {
        return $this->hasOne(Contato::class);
    }

}
