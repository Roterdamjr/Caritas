<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefone', 
        'email',
        'endereco'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
