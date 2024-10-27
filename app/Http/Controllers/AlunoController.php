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

    public function ficha()
    {

        $aluno =Aluno::findOrFail(1);

        $dataNascimento = $aluno->pessoa->data_nascimento  ? 
        \Carbon\Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y')
        : null;  


        $data = [   'nome'                  => $aluno->pessoa->nome,
                    'nome_social'           => $aluno->pessoa->nome_social,
                    'atividade'             => $aluno->atividade,
                    'atividade_dia_semana'  => $aluno->atividade_dia_semana,
                    'atividade_turno'       => $aluno->atividade_turno,
                    'atividade_horario'     => $aluno->atividade_horario,
                    'data_nascimento'       => $dataNascimento,
                    'idade'                 => Carbon::parse($dataNascimento)->age,
                    'estado_civil'          => $aluno->pessoa->estado_civil,
                    'sexo'                  => $aluno->pessoa->sexo,
                    'cor'                   => $aluno->pessoa->cor,
                    'endereco'              => $aluno->pessoa->contato->endereco,
                    'comunidade'            => $aluno->comunidade,
                    'telefone'              => $aluno->pessoa->contato->telefone,
                    'email'                 => $aluno->pessoa->contato->email,             
                    'instituicao'           => $aluno->instituicao,
                    'nome_mae'              => $aluno->pessoa->nome_mae,
                    'nome_pai'              => $aluno->pessoa->nome_pai,
                    'nome_responsavel'      => $aluno->pessoa->nome_responsavel,
                    'parentesco_responsavel' => $aluno->pessoa->parentesco_responsavel,
                    'telefone_responsavel'  => $aluno->pessoa->telefone_responsavel,
                    'escolaridade'          => $aluno->escolaridade,
                    'ano_escolar'           => $aluno->ano_escolar,          
                    'turno'                 => $aluno->turno,
                    'clinica'               => $aluno->clinica,
                    'beneficio'             => $aluno->beneficio,
                    'necessidade'            => $aluno->necessidade,
                    'uniformes'             => $aluno->uniformes
                ];
        return view('alunos.ficha',$data);
    }

    public function choose(){
        $candidatos = Candidato::with('contato')->get();
        return view('alunos.choose', ['candidatos'=>$candidatos]);
    }

    public function create(){
        return view('alunos.create');
    }

     //*********************** incluir **************
    public function store(Request $request){

        //------- pessoa ---------//
        $pessoa = new Pessoa;
        $pessoa->nome                   = $request->nome;
        $pessoa->nome_social            = $request->nome_social;
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
        $contato->email  =   $request->email;
        $contato->save();
        
        //------- aluno ---------//
        $aluno = new Aluno;
        $aluno->pessoa_id = $pessoa->id;
        $aluno->atividade = $request->atividade;
        $aluno->atividade_dia_semana = $request->atividade_dia_semana;
        $aluno->atividade_turno = $request->atividade_turno;
        $aluno->atividade_horario = $request->atividade_horario_ini . ' - ' . $request->atividade_horario_fim;
        $aluno->profissao = $request->profissao;
        $aluno->instituicao = $request->instituicao;
        $aluno->escolaridade = $request->escolaridade;
        $aluno->turno = $request->turno;
        $aluno->ano_escolar = $request->ano_escolar;
        $aluno->beneficio = $request->beneficio;
        $aluno->clinica = $request->clinica;
        $aluno->necessidade = $request->necessidade;
        $aluno->comunidade = $request->comunidade;
        $aluno->uniformes = $request->uniformes;
        $aluno->save();

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

        list($atividade_horario_ini, $atividade_horario_fim) = explode('-', $aluno->atividade_horario);


        return view('alunos.edit', [
                'aluno'=>$aluno,
                'data_nascimento' => $dataNascimento,
                'atividade_horario_ini' => $atividade_horario_ini,
                'atividade_horario_fim' => $atividade_horario_fim
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
        $pessoa->nome_social            = $request->nome_social;
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
            $request->except(['nome', 'nome_social','data_nascimento','nome_mae','nome_pai','nome_responsavel', 
                            'parentesco_responsavel','telefone_responsavel', 'estado_civil','sexo','cor', 
                            'telefone','endereco','email','atividade_horario_ini','atividade_horario_fim'])
        ); // Atualiza tudo exceto os campos da pessoa


        $aluno->update(['atividade_horario' => $request->atividade_horario_ini . ' - ' . $request->atividade_horario_fim]);
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
                        'nome_social'           => $aluno->pessoa->nome_social,
                        'atividade'             => $aluno->atividade,
                        'atividade_dia_semana'  => $aluno->atividade_dia_semana,
                        'atividade_turno'       => $aluno->atividade_turno,
                        'atividade_horario'     => $aluno->atividade_horario,
                        'data_nascimento'       => $dataNascimento,
                        'idade'                 => Carbon::parse($dataNascimento)->age,
                        'estado_civil'          => $aluno->pessoa->estado_civil,
                        'sexo'                  => $aluno->pessoa->sexo,
                        'cor'                   => $aluno->pessoa->cor,
                        'endereco'              => $aluno->pessoa->contato->endereco,
                        'comunidade'            => $aluno->comunidade,
                        'telefone'              => $aluno->pessoa->contato->telefone,
                        'email'                 => $aluno->pessoa->contato->email,             
                        'instituicao'           => $aluno->instituicao,
                        'nome_mae'              => $aluno->pessoa->nome_mae,
                        'nome_pai'              => $aluno->pessoa->nome_pai,
                        'nome_responsavel'      => $aluno->pessoa->nome_responsavel,
                        'parentesco_responsavel' => $aluno->pessoa->parentesco_responsavel,
                        'telefone_responsavel'  => $aluno->pessoa->telefone_responsavel,
                        'escolaridade'          => $aluno->escolaridade,
                        'ano_escolar'           => $aluno->ano_escolar,          
                        'turno'                 => $aluno->turno,
                        'clinica'               => $aluno->clinica,
                        'beneficio'             => $aluno->beneficio,
                        'necessidade'            => $aluno->necessidade,
                        'uniformes'             => $aluno->uniformes
                    ];
    
            $pdf = PDF::loadView('alunos/ficha', $data);
    
            return $pdf->download('meu_arquivo.pdf');

        }


}
