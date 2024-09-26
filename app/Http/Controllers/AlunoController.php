<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Contato;
use App\Models\Pessoa;

class AlunoController extends Controller
{
    public function dashboard(){  
        //$candidatos = Candidato::all();
        $alunos = Aluno::with('contato')->get();
        return view('alunos.dashboard' ,['alunos'=>$alunos] );
    }

    public function create(){
        return view('alunos.create');
    }

}
