
<style>
    body {
        font-family: Arial;
        font-size: 9.5px;
        color: #333;
        margin: 60px;
    }
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }
    .titulo {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
        font-family: Arial;
        font-size: 12px;
        margin-bottom: 20px;
    }
    .conteudo {
        text-align: justify;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        font-family: Arial; /* Adiciona a mesma fonte da body à tabela */
        font-size: 9.5px; /* Define o mesmo tamanho de fonte */
    }

    th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left; /* Alinha o texto à esquerda */
    }
    th {
        background-color: #f2f2f2; /* Cor de fundo para os cabeçalhos */
    }
    .rodape {
    margin-top: 10px; /* Ajuste o valor conforme necessário */
    text-align: center;}

    .rodape-com-margem {
    margin-top: 50px; /* Ajuste o valor conforme necessário */
    text-align: center;
}

</style>

<div class="container"> 
    <h1 class="titulo">Ficha do Aluno</h1>

    <table>
        <tr>
            <th>Nome completo:</th>
            <td colspan="3">{{$nome}}</td>
        </tr>
        <tr>
            <th>Atividade:</th>
            <td>{{$atividade}}</td>
            <th>Horário:</th>
            <td>{{ $atividade_dia_semana }} - {{ $atividade_turno }} - {{ $atividade_horario }}</td>
        </tr>
        <tr>
            <th>Data de Nascimento:</th>
            <td>{{$data_nascimento}}</td>
            <th>Idade:</th>
            <td>{{$idade}}</td>
        </tr>
        <tr>
            <th >Estado Civil:</th>
            <td colspan="3">{{$estado_civil}}</td>
        </tr>
        <tr>
            <th>Cor:</th>
            <td>{{$cor}}</td>
            <th>Sexo:</th>
            <td>{{$sexo}}</td>
        </tr>
        <tr>
            <th>Endereco:</th>
            <td>{{$endereco}}</td>
            <th>Comunidade:</th>
            <td>{{$comunidade}}</td>
        </tr>
        <tr>
            <th>Telefone:</th>
            <td>{{$telefone}}</td>
            <th>e-mail:</th>
            <td>{{$email}}</td>
        </tr>
        <tr>
            <th>Nome da mãe:</th>
            <td>{{$nome_mae}}</td>
            <th>Nome do pai:</th>
            <td>{{$nome_pai}}</td>
        </tr>
            <th>Nome do Responsável:</th>
            <td>{{$nome_responsavel}}</td>
            <th>Parentesco:</th>
            <td>{{$parentesco_responsavel}}</td>
        <tr>
        </tr>
            <th>Escolaridade:</th>
            <td>{{$escolaridade}}</td>
            <th>Instituição de ensino:</th>
            <td>{{$instituicao}}</td>
        <tr>
            <th>Ano/Período:</th>
            <td>{{$ano_escolar}}</td>
            <th>Turno:</th>
            <td>{{$turno}}</td>
        </tr>
        <tr>
            <th>Clínica da Família:</th>
            <td>{{$clinica}}</td>
            <th>Benefício do Governo:</th>
            <td>{{$beneficio}}</td>

        </tr>
        <tr>
            <th>Necessidade Específica:</th>
            <td>{{$necessidade}}</td>
            <th>Uniforme:</th>
            <td> Body: {{ $uniformes[0] }} , Saia: {{ $uniformes[1] }},Camisa: {{ $uniformes[2] }},Calçado: {{ $uniformes[3] }}  </td>
        </tr>
    </table>

    <p class="rodape-com-margem"> Rio de Janeiro, ___ de ____________ de 20_____</p>

    <p class="rodape-com-margem">_____________________________________</p>
    <p class="rodape">Assinatura do Responsável</p>

</div>  

