<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voluntario;
use App\Models\Contato;
use App\Models\Pessoa;
use Carbon\Carbon;
use PDF;

class VoluntarioController extends Controller
{
    public function dashboard(){  
        $voluntarios = Voluntario::with('contato')->get();
        return view('voluntarios.dashboard' ,['voluntarios'=>$voluntarios] );
    }

    public function create(){
        return view('voluntarios.create');
    }

    public function store(Request $request){
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->rg = $request->rg;
        $pessoa->orgao_emissor = $request->orgao_emissor;
        $pessoa->cpf = $request->cpf;
        
        $request->validate([ 'data_nascimento' => 'nullable|date_format:d/m/Y',  ]);
        if ($request->filled('data_nascimento')) {
            $data_nascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } else {
            $data_nascimento = null; 
        }
        $pessoa->data_nascimento = $data_nascimento;
        $pessoa->nacionalidade = $request->nacionalidade;
        $pessoa->estado_civil = $request->estado_civil;
        $pessoa->save();

        $contato = new Contato();
        $contato->pessoa_id =   $pessoa->id;
        $contato->endereco  =   $request->endereco;
        $contato->telefone  =   $request->fone;
        $contato->email  =   $request->email;
        $contato->save();

        $Voluntario = new Voluntario;
        $Voluntario->pessoa_id = $pessoa->id;
        $Voluntario->profissao = $request->profissao;
        $Voluntario->data_inicio = Carbon::now();
        $Voluntario->carga_horaria = $request->carga_horaria;
        $Voluntario->save();

        return redirect('/voluntarios/dashboard')->with("msg","Voluntario criado com sucesso");
    }

    public function show($id){  
        $Voluntario =Voluntario::findOrFail($id);
        
        $dataNascimento = $Voluntario->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($Voluntario->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        return view('voluntarios.show', [
            'Voluntario' => $Voluntario,
            'dataNascimento' => $dataNascimento
        ]);
    }

    //editar
    public function edit($id){ 
        $Voluntario =Voluntario::findOrFail($id);

        $dataNascimento = $Voluntario->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($Voluntario->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        return view('voluntarios.edit', [
                'voluntario'=>$Voluntario,
                'data_nascimento' => $dataNascimento
                 ]);
    }
    
    public function update(Request $request){ 
        $Voluntario = Voluntario::findOrFail($request->id);

        $request->validate([  'data_nascimento' => 'nullable|date_format:d/m/Y',   ]);

        if ($request->filled('data_nascimento')) {
            $data_nascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } else {
            $data_nascimento = null; 
        }

        $pessoa = $Voluntario->pessoa;
        $pessoa->update([
            'nome' => $request->nome,
            'data_nascimento' => $data_nascimento,
            'nome_responsavel' => $request->nome_responsavel,
            'parentesco_responsavel' => $request->parentesco_responsavel,
        ]);
   
        $contato = $pessoa->contato;
        $contato->update([
            'telefone' => $request->fone,
            'email' => $request->email
        ]);

        
        $Voluntario->update(
            $request->except(['nome', 'data_nascimento','nome_responsavel', 'parentesco_responsavel','email', 'fone'])
        ); // Atualiza tudo exceto os campos da pessoa
        $Voluntario->update(['atividades' => $request->atividades]);

        return redirect('/voluntarios/dashboard')->with("msg","Voluntario alterado com sucesso");
    }

    //deletar
    public function destroy($id){     
        $Voluntario = Voluntario::findOrFail($id);
        $pessoa = $Voluntario->pessoa;
        $contato = $pessoa->contato;

        $contato->delete();
        $Voluntario->delete();
        $pessoa->delete();
        
        return redirect('/voluntarios/dashboard')->with("msg","Voluntario excluído com sucesso");
    }

    public function gerarPDF($id)
    {
        $Voluntario =Voluntario::findOrFail($id);

        $dataNascimento = $Voluntario->pessoa->data_nascimento  ? 
        \Carbon\Carbon::parse($Voluntario->pessoa->data_nascimento)->format('d/m/Y')
        : null;  
        
        $data = [   'nome' => $Voluntario->pessoa->nome,
                    'telefone' => $Voluntario->pessoa->contato->telefone,
                    'email' => $Voluntario->pessoa->contato->email,
                    'data_nascimento' => $dataNascimento,
                    'nome_responsavel' => $Voluntario->pessoa->nome_responsavel,
                    'parentesco_responsavel' => $Voluntario->pessoa->parentesco_responsavel,
                    'atividades' => $Voluntario->atividades];

        $pdf = PDF::loadView('voluntarios/pdf', $data);

        return $pdf->download('meu_arquivo.pdf');
    }
}
