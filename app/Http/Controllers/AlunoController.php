<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Contato;
use App\Models\Pessoa;
use App\Models\Candidato;
use Carbon\Carbon;
use PDF;

class AlunoController extends Controller
{
    public function dashboard(){  
        $alunos = Aluno::with('contato')->get();
        return view('alunos.dashboard' ,['alunos'=>$alunos] );
    }

    public function choose(){
        $candidatos = Candidato::with('contato')->get();
        return view('alunos.choose', ['candidatos'=>$candidatos]);
    }

    public function create($id){
        $candidato =Candidato::findOrFail($id);
        return view('alunos.create',['candidato'=>$candidato]);
    }

     //*********************** incluir **************
    public function store(Request $request){

        //------- pessoa ---------//
        $pessoa = new Pessoa;
        $pessoa->nome                   = $request->nome;
        $pessoa->nome_mae               = $request->nome_mae;
        $pessoa->nome_pai               = $request->nome_pai;
        $pessoa->nome_responsavel       = $request->nome_responsavel;
        $pessoa->parentesco_responsavel = $request->parentesco_responsavel;
        $pessoa->telefone_responsavel   = $request->telefone_responsavel;

        $request->validate([ 'data_nascimento' => 'nullable|date_format:d/m/Y',  ]);
        if ($request->filled('data_nascimento')) {
            $data_nascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } else {
            $data_nascimento = null; 
        }
        $pessoa->data_nascimento = $data_nascimento;

        $pessoa->estado_civil = $request->estado_civil;
        $pessoa->sexo = $request->sexo;
        $pessoa->cor = $request->cor;
        $pessoa->save();

         //------- contato ---------//
        $contato = new Contato();
        $contato->pessoa_id =   $pessoa->id;
        $contato->telefone  =   $request->telefone;
        $contato->endereco  =   $request->endereco;
        $contato->save();
        
        //------- aluno ---------//
        $aluno = new Aluno;
        $aluno->pessoa_id = $pessoa->id;
        $aluno->atividades = $request->atividades;
        $aluno->profissao = $request->profissao;
        $aluno->escolaridade = $request->escolaridade;
        $aluno->turno = $request->turno;
        $aluno->ano_escolar = $request->ano_escolar;
        $aluno->beneficio = $request->beneficio;
        $aluno->clinica = $request->clinica;
        $aluno->acompanhamento = $request->acompanhamento;
        $aluno->necessidade_especial = $request->necessidade;
        $aluno->comunidade = $request->comunidade;
        $aluno->uniformes = $request->uniformes;
        $aluno->save();

         //------- excluir candidato ---------//
        $candidatoId = $request->candidato_id;
        $candidato = Candidato::findOrFail($candidatoId);
        $candidato->delete();

        return redirect('/alunos/dashboard')->with("msg","Aluno criado com sucesso");
        //return redirect('/alunos/dashboard')->with("msg","id". $candidatoId);
    }

     //***************** exibir *********************
    public function show($id){  
        $aluno =Aluno::findOrFail($id);
        
        $data_nascimento = $aluno->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        return view('alunos.show', [
            'aluno' => $aluno,
            'data_nascimento' => $data_nascimento
        ]);
    }

     //*************** editar **************
    public function edit($id){ 
        $aluno =Aluno::findOrFail($id);

        $dataNascimento = $aluno->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        return view('alunos.edit', [
                'aluno'=>$aluno,
                'data_nascimento' => $dataNascimento
                 ]);
    }

    //**************** alterar *****************
    public function update(Request $request){ 
        $aluno = Aluno::findOrFail($request->id);

        $request->validate([  'data_nascimento' => 'nullable|date_format:d/m/Y',   ]);

        if ($request->filled('data_nascimento')) {
            $data_nascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } else {
            $data_nascimento = null; 
        }

                /*----  atualiza pessoa ----*/
        $pessoa = $aluno->pessoa;
    
        $pessoa->nome                   = $request->nome;
        $pessoa->nome_mae               = $request->nome_mae;
        $pessoa->nome_pai               = $request->nome_pai;
        $pessoa->nome_responsavel       = $request->nome_responsavel;
        $pessoa->parentesco_responsavel = $request->parentesco_responsavel;
        $pessoa->telefone_responsavel   = $request->telefone_responsavel;
        $pessoa->estado_civil           = $request->estado_civil;
        $pessoa->sexo                   = $request->sexo;
        $pessoa->cor                    = $request->cor;

        $pessoa->update([
            'nome' =>                   $request->nome,
            'data_nascimento' =>        $data_nascimento,
            'nome_mae' =>               $request->nome_mae,
            'nome_pai' =>               $request->nome_pai,
            'nome_responsavel' =>       $request->nome_responsavel,
            'parentesco_responsavel' => $request->parentesco_responsavel,
            'telefone_responsavel' =>   $request->telefone_responsavel,
            'estado_civil' =>           $request->estado_civil,
            'sexo' =>                   $request->sexo,
            'cor' =>                    $request->cor
        ]);

                /*----  atualiza contato ----*/
        //dd($request->endereco);

        $contato = $pessoa->contato;

        $contato->update([
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'email' => $request->email
        ]);

                /*----  atualiza aluno ----*/

        $aluno->update(
            $request->except(['nome', 'data_nascimento','nome_mae','nome_pai','nome_responsavel', 
                            'parentesco_responsavel','telefone_responsavel', 'estado_civil','sexo','cor', 
                            'telefone','endereco','email'])
        ); // Atualiza tudo exceto os campos da pessoa

        $aluno->update(['atividades' => $request->atividades]);
        $aluno->update(['uniformes' => $request->uniformes]);

        return redirect('/alunos/dashboard')->with("msg", "Aluno alterado com sucesso"  );
    }

       //****************** excluir **************
        public function destroy($id){     
            $aluno = Aluno::findOrFail($id);
            $pessoa = $aluno->pessoa;
            $contato = $pessoa->contato;
    
            $contato->delete();
            $aluno->delete();
            $pessoa->delete();
            
            return redirect('/alunos/dashboard')->with("msg","Aluno excluído com sucesso");
        }

        public function gerarPDF($id)
        {
            $aluno =Aluno::findOrFail($id);
    
            $dataNascimento = $aluno->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y')
            : null;  
            
            $data = [   'nome'                  => $aluno->pessoa->nome,
                        'atividades'            => $aluno->atividades,
                        'data_nascimento'       => $dataNascimento,
                        'telefone'              => $aluno->pessoa->contato->telefone,
                        'email'                 => $aluno->pessoa->contato->email,
                        'endereco'              => $aluno->pessoa->contato->endereco,
                        'nome_mae'              => $aluno->pessoa->nome_mae,
                        'nome_pai'              => $aluno->pessoa->nome_pai,
                        'nome_responsavel'      => $aluno->pessoa->nome_responsavel,
                        'parentesco_responsavel' => $aluno->pessoa->parentesco_responsavel,
                        'telefone_responsavel'  => $aluno->pessoa->telefone_responsavel,
                        'estado_civil'          => $aluno->pessoa->estado_civil,
                        'sexo'                  => $aluno->pessoa->sexo,
                        'cor'                   => $aluno->pessoa->cor,
                        'profissao'             => $aluno->profissao,
                        'escolaridade'          => $aluno->escolaridade,
                        'ano_escolar'           => $aluno->ano_escolar,
                        'turno'                 => $aluno->turno,
                        'clinica'               => $aluno->clinica,
                        'beneficio'             => $aluno->beneficio,
                        'acompanhamento'        => $aluno->acompanhamento,
                        'comunidade'             => $aluno->comunidade,
                        'necessidade_especial'   => $aluno->necessidade_especial,
                        'uniformes'             => $aluno->uniformes
                    ];
    
            $pdf = PDF::loadView('alunos/pdf', $data);
    
            return $pdf->download('meu_arquivo.pdf');

        }


}
