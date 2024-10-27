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
    .subtitulo {
        text-align: left;
        font-weight: bold;
        text-decoration: underline;
        font-family: Arial;
        font-size: 10px;
        margin-top: 20px;
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
    th:nth-child(1), td:nth-child(1) { 
        width: 15%; /* Largura da 1ª coluna */
    }
    th:nth-child(3), td:nth-child(3) { 
        width: 15%; /* Largura da 3ª coluna */
    }
    td:nth-child(2), td:nth-child(4) { 
        width: 35%; /* Largura das 2ª e 4ª colunas */
    }
    
    ul {
        list-style-type: disc; /* Tipo de marcador como bolinha */
        margin: 10px 0; /* Margem em cima e embaixo da lista */
        padding-left: 20px; /* Indentação da lista */
    }
    .rodape {
    margin-top: 10px; /* Ajuste o valor conforme necessário */
    text-align: center;}

    .rodape-com-margem {
    margin-top: 40px; /* Ajuste o valor conforme necessário */
    text-align: center;
}


</style>

<div class="container">
    <div class="titulo">TERMO DE ADESÃO AO TRABALHO VOLUNTÁRIO CASA DE CÁRITAS</div>

    <div class="conteudo"> 
        Pelo presente <strong>Termo de Adesão</strong>, que entre si fazem, de um lado, 
        como <strong>INSTITUIÇÃO/ENTIDADE BENEFICIÁRIA</strong>, 
        doravante indicada, Casa Social de Caritas, instituição privada sem fins lucrativos 
        e com finalidade _____________________, inscrita no CNPJ nº 26.469.868/0002-00, 
        nome fantasia Casa Transitória, com sede à Rua 24 de Maio, 911 – Eng. Novo - RJ, 
        endereço eletrônico www.casadecaritas.org.br, neste ato representada por seu Representante Legal, 
        conforme previsões estatutárias, e, de outro lado, como <strong>VOLUNTÁRIO</strong>, assim doravante indicado:
    </div>

    <div class="subtitulo">INFORMAÇÕES DO VOLUNTÁRIO:</div>
    <table>
        <tr>
            <th>Nome completo:</th>
            <td colspan="3">{{$nome}}</td>
        </tr>
        <tr>
            <th>RG:</th>
            <td>{{$rg}}</td>
            <th>CPF:</th>
            <td>{{$cpf}}</td>
        </tr>
        <tr>
            <th>Data de Nascimento:</th>
            <td>{{$data_nascimento}}</td>
            <th>Nacionalidade:</th>
            <td>{{$nacionalidade}}</td>
        </tr>
        <tr>
            <th>Estado Civil:</th>
            <td>{{$estado_civil}}</td>
            <th>Profissão:</th>
            <td>{{$profissao}}</td>
        </tr>
        <tr>
            <th>Endereço completo:</th>
            <td colspan="3">{{$endereco}}</td>
        </tr>
        <tr>
            <th>Telefone:</th>
            <td>{{$telefone}}</td>
            <th>e-mail:</th>
            <td>{{$email}}</td>
        </tr>
    </table>
 
    <div class="subtitulo">ESCOPO DO TRABALHO:</div>    <p></p>
    <div class="conteudo"> 
        Atividade a ser desenvolvida: Sem prejuízo de outras atividades porventura necessárias 
        ao bom andamento do trabalho da entidade, concordando ambas as partes, previamente, 
        as atividades principais desenvolvidas pelo voluntário(a) são: 
    </div>
    <p>Data do início: {{$data_inicio}}</p>
    <div class="conteudo"> 
        Disponibilidade do voluntário: à combinar,  conforme (i) a necessidade do trabalho voluntariado
        a ser desenvolvido pela entidade beneficiária e (ii) a disponibilidade/aceite do voluntário.
    </div>
    <div class="conteudo"> 
        Período: Pelo período de vigência do Termo de Adesão do Serviço Voluntário.
    </div>

    <div class="conteudo"> 
        As partes acima identificadas, ajustam e acordam entre si, o presente Termo de Adesão de Serviço Voluntário, bem como declaram desde já 
        que outorgam, aceitam e se obrigam a cumprir fielmente às condições deste instrumento particular, que se regerá 
        pela Lei nº 9.608/98, que dispõe sobre o serviço voluntário e dá outras providências, assim como se regerá pelas 
        cláusulas e condições descritas abaixo:
        
        <ul>	
            <li>O trabalho voluntário desempenhado junto à instituição beneficiária está de acordo com a Lei nº 9.608 de 18/02/98 (alterada e atualizada Lei nº 13.297 de 16/06/2016), 
                disponibilizada no ato da assinatura 
                deste documento, sendo uma atividade voluntária, não remunerada, e não gerando vínculo empregatício nem funcional, ou quaisquer obrigações trabalhistas, previdenciárias ou afins pela entidade beneficiária.
            </li><li>O voluntário deve comprovar ser maior de 18 anos no ato da assinatura do contrato, apresentando documento de identificação civil e, sempre que solicitado, deverá disponibilizar documentação pessoal, 
                inclusive foto pessoal, se responsabilizando a entidade beneficiária pelo tratamento e proteção dos dados pessoais, nos termos da Lei Geral de Proteção de Dados.
            </li><li>O voluntário deverá cumprir, durante participação e vigência deste instrumento, o Estatuto, o Regimento Interno e demais normas estabelecidas pela entidade beneficiária, cabendo ao voluntário o dever 
                de executar e cumprir as atividades que lhe competem, respeitando a duração e horários especificados, mantendo assiduidade, compromisso e responsabilidade com o fim de colaborar com os objetivos assistenciais
                 que são prestados pela instituição.
            </li><li>	O voluntário declara que é detentor de todas as condições necessárias ao desempenho dos serviços a que se compromete, dispondo de tempo, capacidade física e emocional, e, que tem ciência de que, 
                no caso de acarretar danos a terceiros, sejam decorrentes de dolo ou culpa, poderá ficar sujeito a arcar com os consequentes prejuízos.
            </li><li>	Compete ao voluntário participar das atividades e cumprir com empenho, pontualidade, assiduidade e interesse a função estabelecida.
            </li><li>	Será de inteira responsabilidade do voluntário qualquer dano ou prejuízo que vier a causar à entidade beneficiária, resguardado o direito de regresso da Instituição.
            </li><li>	O voluntário declara estar ciente que deverá preservar a imagem da entidade beneficiária, tomando os cuidados necessários para não a macular, bem como manter atitude proba, moral e ética, 
                sob pena de ser convidado a se retirar da instituição.
            </li><li>	O voluntário isenta a entidade beneficiária de qualquer responsabilidade referente a acidentes pessoais ou materiais, que porventura, venham a ocorrer no desempenho de suas atividades. 
            </li><li>	O voluntário tem o dever de manter sigilo absoluto, privacidade e confidencialidade e não fazer uso indevido de informação que receba ou dados aos quais tenha acesso no desempenho de sua atividade voluntária. 
            </li><li>	O voluntário consente com o tratamento de seus dados pessoais pela entidade beneficiária, que o faz baseada e em observância à Lei 13.709/2018, Lei Geral de Proteção de Dados (LGPD).
            </li><li>	A instituição beneficiária se compromete a realizar tratamento de dados pessoais de acordo com as disposições legais visando dar a efetiva proteção aos dados coletados, utilizando-os somente para a finalidade 
                deste termo ou nos limites do consentimento expressamente manifestado por escrito.
            </li><li>	O voluntário declara estar ciente e autoriza a instituição beneficiária, acima qualificada, a título gratuito (sem quaisquer ônus) e em caráter definitivo, irrevogável, irretratável e por prazo indeterminado, 
                utilizar o seu nome, imagem e voz captados, gravados e fotografados nos trabalhos da instituição, produzidos durante a participação em suas atividades, bem como reproduzidas por qualquer forma de tecnologia para uso
                 em atividades doutrinárias ou de divulgação, seja através de mídia virtual, impressa, televisiva, radiodifusão, palestras e seminários, dentre outros, de forma gratuita por prazo indeterminado, sem limite de quantidade, 
                 para fins de confecção de material promocional, transmissões, retransmissões, publicações, cópias, reproduções de exemplares bem como para divulgação de campanha publicitária e promoção da instituição beneficiária e/ou 
                 de seus patrocinadores.
            </li><li>	O voluntário será identificado através de vestimenta da instituição beneficiária e/ou crachá de identificação, que lhe garantirão acesso e uso de instalações necessárias ou convenientes ao desenvolvimento 
                das atividades previstas, nos horários e termos dispostos pela instituição.  
            </li><li>	Os objetos/vestimenta de identificação da instituição que estejam de posse do voluntário obrigatoriamente deverão ser devolvidos pelo voluntário ao responsável identificado pela instituição, quando de seu desligamento.
            </li><li>	O desligamento do voluntário das atividades poderá ocorrer a qualquer tempo, bastando apenas o desejo expresso de uma das partes, solicitando a instituição que seja notificada por escrito (meio virtual 
                ou físico, comprovando a entrega) com, pelo menos, 48h de antecedência, 
                possibilitando o reajuste da atribuição do trabalho voluntário que seria de responsabilidade do voluntário retirante. 
            </li><li>	Caso o voluntário deixe de comparecer por 60 dias seguidos e consecutivos para prestar os serviços de voluntariado sem que tenha noticiado seu desligamento, poderá a instituição beneficiária desligar o voluntário, 
                através de Termo Unilateral assinado pelo Presidente ou seu 
                representante outorgado, a ser enviado pelos canais de contato do voluntário, tudo arquivado na pasta do voluntário (pasta física ou virtual) junto à instituição beneficiária. 
            </li><li>	A instituição beneficiária se reserva o direito de, a qualquer tempo, sempre que a conduta e atuação do voluntário macular a entidade ou o próprio praticar ato ímprobo, imoral e antiético, notificar o voluntário 
                convidando-o a se retirar da instituição, o qual deve fazê-lo de imediato.
            </li><li>	Algumas despesas decorrentes de sua atividade voluntária poderão ser ressarcidas, desde que previamente acordado com a instituição beneficiária e apenas e se autorizadas antecipadamente por esta.
            </li><li>	As partes elegem o Foro Regional do Méier – Tribunal de Justiça do Rio de Janeiro, para dirimir quaisquer dúvidas e processar ações derivadas deste instrumento, com renúncia expressa das partes aderentes 
                de qualquer outro foro, por mais especial ou privilegiado que seja ou que venha a ser.
            </li><li>	Declara o voluntário, pelo presente Termo de Adesão e ciente da Lei n. 9.608/1998 que rege o trabalho voluntário, que decide espontaneamente realizar atividade voluntária nesta organização.
            </li><li>	Declara o voluntário, ainda, estar ciente da legislação específica, e de todas as cláusulas do presente Termo de Adesão ao Serviço Voluntário referente à instituição beneficiada, do qual tem 
                plena ciência e concordância, também ciente de que o trabalho voluntário não será remunerado
                 e que em nenhuma hipótese configurará vínculo empregatício ou gerará qualquer obrigação de natureza trabalhista, previdenciária ou afim, tendo ciência que o trabalho poderá ser interrompido a qualquer momento,
                 mediante notificação escrita e/ou assinatura do distrato, quando não houver mais 
                 interesse por qualquer das partes envolvidas.
            </li><li>	Declara o voluntário, por fim, estar ciente de que eventuais danos pessoais ou materiais causados no exercício do trabalho voluntário e decorrente deste serão de sua total e integral responsabilidade 
                e não serão imputados à entidade beneficiária. 
        </li><li>	E por estarem juntos e compromissados, assinam as partes o presente Termo, contendo três páginas, em duas vias, de igual forma e teor, entrando em vigor na data de sua assinatura, por tempo indeterminado,
             podendo ser rescindido a qualquer tempo, por vontade expressa (escrita) 
            de qualquer das partes, conforme já delineado acima.
        </li>
    </div>
    <p class="rodape-local-data"> Rio de Janeiro, ___ de ____________ de 20_____</p>

    <p class="rodape-com-margem">_____________________________________</p>
    <p class="rodape">Instituição beneficiária, por seu representante legal</p>
    <p class="rodape">CNPJ n.º _______________</p>
    <p class="rodape-com-margem">_____________________________________</p>
    <p class="rodape">Assinatura do Voluntário</p>
    <p class="rodape">CPF n.º </p>

</div>
