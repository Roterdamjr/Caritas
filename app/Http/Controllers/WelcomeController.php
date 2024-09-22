<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Contato;
use App\Models\Pessoa;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function boavinda(){  
        //return view('candidatos.dashboard');
        return view('boavinda');
    }

}



