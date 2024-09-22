<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Contato;
use App\Models\Pessoa;
use Carbon\Carbon;

class CandidatoController extends Controller
{
    public function dashboard(){  
        //$candidatos = Candidato::all();
        $candidatos = Candidato::with('contato')->get();
        return view('candidatos.dashboard' ,['candidatos'=>$candidatos] );
    }

    public function create(){
        return view('candidatos.create');
    }

    public function store(Request $request){
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->data_nascimento = $request->data_nascimento;
        $pessoa->nome_responsavel = $request->nome_responsavel;
        $pessoa->parentesco_responsavel = $request->parentesco_responsavel;
        $pessoa->nome = $request->nome;
        $pessoa->save();

        $contato = new Contato();
        $contato->pessoa_id =   $pessoa->id;
        $contato->telefone  =   $request->fone;
        $contato->email  =   $request->email;
        $contato->save();

        $candidato = new Candidato;
        $candidato->pessoa_id = $pessoa->id;
        $candidato->data_reserva = Carbon::now();
        $candidato->atividades = $request->atividades;
        $candidato->save();

        return redirect('/candidatos/dashboard')->with("msg","Candidato criado com sucesso");
    }

    public function show($id){  
        $candidato =Candidato::findOrFail($id);
        $dataNascimento = \Carbon\Carbon::parse($candidato->pessoa->data_nascimento)->format('d/m/Y');

    // Passar o candidato e a data formatada para a view
        return view('candidatos.show', [
            'candidato' => $candidato,
            'dataNascimento' => $dataNascimento
        ]);
    }

    //editar
    public function edit($id){ 
        $candidato =Candidato::findOrFail($id);

        return view('candidatos.edit', ['candidato'=>$candidato ]);
    }
    
    public function update(Request $request){ 
        $candidato = Candidato::findOrFail($request->id);

        $candidato->update($request->except(['nome', 'data_nascimento','nome_responsavel', 'parentesco_responsavel','email', 'fone'])); // Atualiza tudo exceto os campos da pessoa

        $pessoa = $candidato->pessoa;

        //$dataNascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        
        
        try {
            $dataNascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } catch (\Exception $e) {
            return back()->withErrors(['data_nascimento' => 'Formato de data inválido.']);
        }
        
        $pessoa->update([
            'nome' => $request->nome,
            'data_nascimento' => $dataNascimento,
            'nome_responsavel' => $request->nome_responsavel,
            'parentesco_responsavel' => $request->parentesco_responsavel,
        ]);
   
        $contato = $pessoa->contato;
        $contato->update([
            'telefone' => $request->fone,
            'email' => $request->email
        ]);

        return redirect('/candidatos/dashboard')->with("msg",$dataNascimento);
    }

    //deletar
    public function destroy($id){     
        $candidato = Candidato::findOrFail($id);
        $pessoa = $candidato->pessoa;
        $contato = $pessoa->contato;

        $contato->delete();
        $candidato->delete();
        $pessoa->delete();
        

        return redirect('/candidatos/dashboard')->with("msg","Candidato excluído com sucesso");
    }
}


