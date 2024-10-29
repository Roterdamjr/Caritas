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

    public function adesao()
    //para testar o PDF
    {                
        $Voluntario =Voluntario::findOrFail(1);

        $dataNascimento = $Voluntario->pessoa->data_nascimento  ? 
        \Carbon\Carbon::parse($Voluntario->pessoa->data_nascimento)->format('d/m/Y')
        : null;  
        $dataInicio = $Voluntario->data_inicio  ? 
        \Carbon\Carbon::parse($Voluntario->data_inicio)->format('d/m/Y')
        : null;  
        
        $data = [   'nome' =>           $Voluntario->pessoa->nome,
                    'atividade' =>      $Voluntario->atividade,
                    'rg' =>             $Voluntario->pessoa->rg,
                    'cpf' =>            $Voluntario->pessoa->cpf,
                    'data_nascimento' =>$dataNascimento,
                    'nacionalidade' =>  $Voluntario->pessoa->nacionalidade,
                    'estado_civil' =>   $Voluntario->pessoa->estado_civil,
                    'profissao' =>      $Voluntario->profissao,
                    'endereco' =>       $Voluntario->pessoa->contato->endereco,
                    'telefone' =>       $Voluntario->pessoa->contato->telefone,
                    'email' =>          $Voluntario->pessoa->contato->email,
                    'data_inicio' =>    $dataInicio];

        return view('voluntarios.adesao',$data);
    }



    public function create(){
        return view('voluntarios.create');
    }

     //*********************** incluir **************
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
        $contato->telefone  =   $request->telefone;
        $contato->email  =   $request->email;
        $contato->save();

        $Voluntario = new Voluntario;
        $Voluntario->pessoa_id = $pessoa->id;
        $Voluntario->profissao = $request->profissao;

        $request->validate([ 'data_inicio' => 'nullable|date_format:d/m/Y',  ]);
        if ($request->filled('data_inicio')) {
            $data_inicio = Carbon::createFromFormat('d/m/Y', $request->data_inicio)->format('Y-m-d');
        } else {
            $data_inicio = null; 
        }     
        $Voluntario->data_inicio = $data_inicio;
        $Voluntario->carga_horaria = $request->carga_horaria;
        $Voluntario->atividade  = $request->atividade;
        $Voluntario->save();

        return redirect('/voluntarios/dashboard')->with("msg","Voluntario criado com sucesso");
    }

     //***************** exibir *********************
    public function show($id){  
        $voluntario =Voluntario::findOrFail($id);
        
        $dataNascimento = $voluntario->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($voluntario->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        $dataInicio = $voluntario->data_inicio  ? 
            \Carbon\Carbon::parse($voluntario->data_inicio)->format('d/m/Y')
            : null;  

        return view('voluntarios.show', [
            'voluntario' => $voluntario,
            'data_nascimento' => $dataNascimento,
            'data_inicio' => $dataInicio
        ]);
    }

    //*************** editar **************
    public function edit($id){ 
        $voluntario =Voluntario::findOrFail($id);

        $dataNascimento = $voluntario->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($voluntario->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        $dataInicio = $voluntario->data_inicio  ? 
            \Carbon\Carbon::parse($voluntario->data_inicio)->format('d/m/Y')
            : null;  

        return view('voluntarios.edit', [
                'voluntario'=>$voluntario,
                'data_nascimento' => $dataNascimento,
                'data_inicio' => $dataInicio
                 ]);
    }
    
    //**************** alterar *****************
    public function update(Request $request){ 
        $Voluntario = Voluntario::findOrFail($request->id);

        $request->validate([  'data_nascimento' => 'nullable|date_format:d/m/Y',   ]);
        if ($request->filled('data_nascimento')) {
            $data_nascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } else {
            $data_nascimento = null; 
        }

        //------- pessoa ---------//
        $pessoa = $Voluntario->pessoa;
        $pessoa->update([
            'nome' =>               $request->nome,
            'rg' =>                 $request->rg,
            'orgao_emissor' =>      $request->orgao_emissor,
            'cpf' =>                $request->cpf,
            'data_nascimento' =>    $data_nascimento,
            'nacionalidade' =>      $request->nacionalidade,
            'estado_civil' =>      $request->estado_civil
        ]);
   
        //------- contato ---------//
        $contato = $pessoa->contato;
        $contato->update([
            'telefone' =>   $request->telefone,
            'email' =>      $request->email,
            'endereco' =>   $request->endereco
        ]);

        //------- voluntario ---------//
        $request->validate([ 'data_inicio' => 'nullable|date_format:d/m/Y',  ]);
        if ($request->filled('data_inicio')) {
            $data_inicio = Carbon::createFromFormat('d/m/Y', $request->data_inicio)->format('Y-m-d');
        } else {
            $data_inicio = null; 
        }     

        $Voluntario->update([
            'data_inicio' => $data_inicio,
            'profissao' => $request->profissao,
            'carga_horaria' => $request->carga_horaria,
            'atividade' => $request->atividade
        ]);

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

        $dataInicio = $Voluntario->data_inicio  ? 
        \Carbon\Carbon::parse($Voluntario->data_inicio)->format('d/m/Y')
        : null;  
        
        $data = [   'nome' =>           $Voluntario->pessoa->nome,
                    'atividade' =>      $Voluntario->atividade,
                    'rg' =>             $Voluntario->pessoa->rg,
                    'cpf' =>            $Voluntario->pessoa->cpf,
                    'data_nascimento' =>$dataNascimento,
                    'nacionalidade' =>  $Voluntario->pessoa->nacionalidade,
                    'estado_civil' =>   $Voluntario->pessoa->estado_civil,
                    'profissao' =>      $Voluntario->profissao,
                    'endereco' =>       $Voluntario->pessoa->contato->endereco,
                    'telefone' =>       $Voluntario->pessoa->contato->telefone,
                    'email' =>          $Voluntario->pessoa->contato->email,
                    'data_inicio' =>    $dataInicio
                ];

        $pdf = PDF::loadView('voluntarios/adesao', $data);

        return $pdf->download('meu_arquivo.pdf');
       
    }

}
