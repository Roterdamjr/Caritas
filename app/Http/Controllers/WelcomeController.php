<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Contato;
use App\Models\Pessoa;
use App\Models\User;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function show(){  
        $usuarios = User::all();
       // dd($usuarios);
        return view('welcome',['usuarios'=>$usuarios]);
    }

}



