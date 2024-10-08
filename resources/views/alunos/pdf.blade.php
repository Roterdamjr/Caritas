<!DOCTYPE html>

<html>
    <head>
        <title>Ficha do Candidato</title>
    </head>

    <body>
        <div class="container ml-5"> 

        <div class="form-group row"> 
            <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
            <label for="nome" class="col-sm-6 col-form-label">{{$nome}}</label>

            <label for="data_nascimento" class="col-sm-2 col-form-label ">Data Nascimento:</label>
            <label for="data_nascimento" class="col-sm-2 col-form-label ">{{$data_nascimento}}</label>
        </div>

        <div class="form-group row"> 
            <label for="nome" class="col-sm-2 col-form-label">Atividades:</label>
            <div class="form-group">
                <ul id="item-list">
                    @if($atividades)
                        @foreach($atividades as $atividade)
                            <li><ion-icon name="play-outline"></ion-icon> {{$atividade}} </li>
                        @endforeach
                    @else
                        <li>Sem atividades</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="form-group row "> 
            <label for="telefone" class="col-sm-2 col-form-label ">Telefone: </label>
            <label for="telefone" class="col-sm-2 col-form-label ">{{$telefone}}</label>

            <label for="" class="col-sm-4 col-form-label "></label>

            <label for="email" class="col-sm-1 col-form-label ">Email:</label>
            <label for="email" class="col-sm-2 col-form-label ">{{$email}}</label>
        </div>

        <div class="form-group row ">
            <label for="endereco" class="col-sm-2 col-form-label ">Endereço:</label>
            <label for="endereco" class="col-sm-2 col-form-label ">{{$endereco}}</label>    
        </div>

        <div class="form-group row "> 
            <label for="nome_mae" class="col-sm-2 col-form-label ">Mãe:</label>
            <label for="nome_mae" class="col-sm-2 col-form-label ">{{$nome_mae}}</label>

            <label for="" class="col-sm-4 col-form-label "></label>

            <label for="nome_mae" class="col-sm-1 col-form-label ">Pai:</label>
            <label for="nome_mae" class="col-sm-2 col-form-label ">{{$nome_pai}}</label>
        </div>

        <div class="form-group row "> 
            <label for="nome_responsavel" class="col-sm-2 col-form-label ">Outro responsável:</label>
            <label for="nome_responsavel" class="col-sm-3 col-form-label ">{{$nome_responsavel}}</label>

            <label for="parentesco_responsavel" class="col-sm-1 col-form-label ">Parentesco:</label>
            <label for="parentesco_responsavel" class="col-sm-2 col-form-label ">{{$parentesco_responsavel}}</label>

            <label for="telefone_responsavel" class="col-sm-1 col-form-label ">Telefone:</label>
            <label for="telefone_responsavel" class="col-sm-1 col-form-label ">"{{$telefone_responsavel}}</label>

        </div>

        <div class="form-group row "> 
            <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil:</label>
            <label for="estado_civil" class="col-sm-2 col-form-label ">{{$estado_civil}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="cor" class="col-sm-1 col-form-label ">Cor:</label>
            <label for="cor" class="col-sm-2 col-form-label ">{{$cor}}</label>

            <label for="sexo" class="col-sm-1 col-form-label ">Sexo:</label>
            <label for="sexo" class="col-sm-1 col-form-label ">{{$sexo}}</label>
        </div>

        <div class="form-group row "> 
            <label for="profissao" class="col-sm-2 col-form-label ">Profissão:</label>
            <label for="profissao" class="col-sm-2 col-form-label ">{{$profissao}}</label>
        </div>

        <div class="form-group row "> 
            <label for="escolaridade" class="col-sm-2 col-form-label ">Escolaridade:</label>
            <label for="escolaridade" class="col-sm-3 col-form-label ">{{$escolaridade}}</label>

            <label for="ano_escolar" class="col-sm-1 col-form-label ">Ano:</label>
            <label for="ano_escolar" class="col-sm-1 col-form-label ">{{$ano_escolar}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="turno" class="col-sm-1 col-form-label ">Turno:</label>
            <label for="turno" class="col-sm-1 col-form-label ">{{$turno}}</label>
        </div>

        <div class="form-group row "> 
            <label for="beneficio" class="col-sm-2 col-form-label ">Benefício Gov.</label>
            <label for="beneficio" class="col-sm-3 col-form-label ">{{$beneficio}}</label>

            <label for="clinica" class="col-sm-1 col-form-label ">Clínica:</label>
            <label for="clinica" class="col-sm-2 col-form-label ">{{$clinica}}</label>
        </div>                

        <div class="form-group row "> 
            <label for="acompanhamento" class="col-sm-2 col-form-label ">Acompanhamento:</label>
            <label for="acompanhamento" class="col-sm-3 col-form-label ">{{$acompanhamento}}</label> 

            <label for="comunidade" class="col-sm-1 col-form-label ">Comunidade</label>
            <label for="comunidade" class="col-sm-2 col-form-label ">{{$comunidade}}</label>
        </div>

        <div class="form-group row "> 
            <label for="necessidade_especial" class="col-sm-2 col-form-label ">Necessidade Especial:</label>
            <label for="necessidade_especial" class="col-sm-2 col-form-label ">{{$necessidade_especial}}</label>
        </div>
<!--
        <div class="form-group row "> 
            <label for="uniforme_body" class="col-sm-2 col-form-label ">Uniforme body:</label>
            <label for="uniforme_body" class="col-sm-2 col-form-label ">{{$uniformes[0]}}</label>

            <label for="uniforme_saia" class="col-sm-1 col-form-label ">Saia:</label>
            <label for="uniforme_saia" class="col-sm-1 col-form-label ">{{$uniformes[1]}}</label>

            <label for="uniforme_camisa" class="col-sm-1 col-form-label ">Camisa:</label>
            <label for="uniforme_camisa" class="col-sm-1 col-form-label ">{{$uniformes[2]}}</label>

            <label for="uniforme_calcado" class="col-sm-1 col-form-label ">Calçado:</label>
            <label for="uniforme_calcado" class="col-sm-1 col-form-label ">{{$uniformes[3]}}</label>
        </div>
-->
        <ul>
    @foreach($uniformes as $uniforme)
        <li>{{ $uniforme }}</li>
    @endforeach
</ul>

        <input type="submit" class="btn btn-primary" value="Editar Aluno">
        </div> <!-- Fim do container com a margem --> 
    
    </body>
</html>