<!DOCTYPE html>

<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                margin: 20px;
            }
            .titulo {
                font-size: 24px;
                margin-bottom: 10px;
            }
            .dados {
                display: flex;
                margin-bottom: 10px;
            }
            .dados label {
                font-weight: bold;
                margin-right: 10px;
            }
        </style>
    </head>

    <body>
        <div class="container"> 
            <h1 class="titulo" style="text-align: center;margin-bottom: 40px;">Ficha do Aluno</h1>

            <div class="dados">
                <label>Nome:</label> <span>{{ $nome }}</span>
            </div>
            <div class="dados">
                <label>Data de Nascimento:</label> <span>{{ $data_nascimento }}</span>
            </div>
            <div class="dados">
                <label>Telefone:</label> <span>{{ $telefone }}</span>
            </div>
            <div class="dados">
                <label>Email:</label> <span>{{ $email }}</span>
            </div>
            <div class="dados">
                <label>Endereço:</label> <span>{{ $endereco }}</span>
            </div>
            
            <div class="dados">
                <label>Atividades:</label> 
            </div>
            <ul>
                @foreach($atividades as $atividade)
                    <li>{{ $atividade }}</li>
                @endforeach
            </ul>

            <div class="dados">
                <label>Mãe:</label> <span>{{ $nome_mae }}</span>
            </div>
            <div class="dados">
                <label>Pai:</label> <span>{{ $nome_pai }}</span>
            </div>

            <div class="dados">
                <label>Outro responsável:</label> <span>{{ $nome_responsavel }}</span>
            </div>
            <div class="dados">
                <label>Parentesco:</label> <span>{{ $parentesco_responsavel }}</span>
            </div>
            <div class="dados">
            <label>Telefone:</label> <span>{{ $telefone_responsavel }}</span>
            </div>

            <div class="linha-itens">
                <div class="dados">
                    <label>Estado Civil:</label> <span>{{ $estado_civil }}</span>
                </div>
                <div class="dados">
                    <label>Cor:</label> <span>{{ $cor }}</span>
                </div>
                <div class="dados">
                    <label>Sexo:</label> <span>{{ $sexo }}</span>
                </div>
            </div>

            <div class="dados">
                <label>Profissão:</label> <span>{{ $profissao }}</span>
            </div>
            <div class="dados">
                <label>Escolaridade:</label> <span>{{ $escolaridade }}</span>
            </div>
            <div class="dados">
                <label>Ano:</label> <span>{{ $ano_escolar }}</span>
            </div>
            <div class="dados">
                <label>Turno:</label> <span>{{ $turno }}</span>
            </div>

            <div class="dados">
                <label>Benefício do Governo:</label> <span>{{ $beneficio }}</span>
            </div>
            <div class="dados">
                <label>Clínica:</label> <span>{{ $clinica }}</span>
            </div>
            <div class="dados">
                <label>Acompanhamento:</label> <span>{{ $acompanhamento }}</span>
            </div>
            <div class="dados">
                <label>Comunidade:</label> <span>{{ $comunidade }}</span>
            </div>
            <div class="dados">
                <label>Necessidade Especial:</label> <span>{{ $necessidade_especial }}</span>
            </div>

            <div class="dados">
                <label>Uniforme:</label> 
            </div>
            <div class="dados">
                <label>Body:</label> <span>{{ $uniformes[0] }}</span>
                <label>Saia:</label> <span>{{ $uniformes[1] }}</span>
                <label>Camisa:</label> <span>{{ $uniformes[2] }}</span>
                <label>Calçado:</label> <span>{{ $uniformes[3] }}</span>
            </div>

        </div> <!-- Fim do container com a margem --> 
    
    </body>
</html>