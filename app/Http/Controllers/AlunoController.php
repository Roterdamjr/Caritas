<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Contato;
use App\Models\Pessoa;
use Carbon\Carbon;

class AlunoController extends Controller
{
    public function dashboard(){  
        $alunos = Aluno::with('contato')->get();
        return view('alunos.dashboard' ,['alunos'=>$alunos] );
    }

    public function create(){
        return view('alunos.create');
    }

    public function store(Request $request){
        $pessoa = new Pessoa;
        $pessoa->nome                   = $request->nome;
        $pessoa->nome_mae               = $request->nome_mae;
        $pessoa->nome_pai               = $request->nome_pai;
        $pessoa->nome_responsavel       = $request->nome_responsavel;
        $pessoa->parentesco_responsavel = $request->parentesco_responsavel;
        $pessoa->telefone_responsavel       = $request->telefone_responsavel;

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

        $contato = new Contato();
        $contato->pessoa_id =   $pessoa->id;
        $contato->telefone  =   $request->telefone;
        $contato->endereco  =   $request->endereco;
        $contato->save();

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

        return redirect('/alunos/dashboard')->with("msg","Aluno criado com sucesso");
    }

    public function show($id){  
        $aluno =Aluno::findOrFail($id);
        
        $dataNascimento = $aluno->pessoa->data_nascimento  ? 
            \Carbon\Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y')
            : null;  

        return view('candidatos.show', [
            'candidato' => $aluno,
            'dataNascimento' => $dataNascimento
        ]);
    }

    //editar
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

    public function update(Request $request){ 
        $aluno = Aluno::findOrFail($request->id);

        $request->validate([  'data_nascimento' => 'nullable|date_format:d/m/Y',   ]);

        if ($request->filled('data_nascimento')) {
            $data_nascimento = Carbon::createFromFormat('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        } else {
            $data_nascimento = null; 
        }

        /**************************  atualiza pessoa *************************/
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

        /*****************************  atualiza contato *************************/
        //dd($request->endereco);

        $contato = $pessoa->contato;

        $contato->update([
            'telefone' => $request->telefone,
            'endereco' => $request->endereco
        ]);

        /*****************************  atualiza aluno *************************/

        $aluno->update(
            $request->except(['nome', 'data_nascimento','nome_mae','nome_pai','nome_responsavel', 
                            'parentesco_responsavel','telefone_responsavel', 'estado_civil','sexo','cor', 
                            'telefone','endereco'])
        ); // Atualiza tudo exceto os campos da pessoa
        $aluno->update(['atividades' => $request->atividades]);

        return redirect('/alunos/dashboard')->with("msg", "Candidato alterado com sucesso"  );
    }

}
