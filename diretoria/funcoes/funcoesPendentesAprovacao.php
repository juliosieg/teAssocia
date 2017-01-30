<?php

$funcao = $_POST['funcao'];

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
}

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

switch ($funcao) {

    case "getTodos":
        getTodos();
        break;
    case "getFichaAssociadoPendente":
        getFichaAssociadoPendente($codigo);
        break;
    case "buscaDadosAprovacao":
        buscaDadosAprovacao($codigo);
        break;
    case "enviarEmailConfirmacao":
        enviarEmailConfirmacao($nome, $email);
        break;
    case "atualizarStatus":
        atualizarStatus($codigo);
        break;
}

function getTodos() {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $result = $conexao->Executar("select a.id, a.nome, a.celular, e.nome as nomeentidade from associado a inner join entidade e"
            . " on e.id = a.identidade where a.status = 2");

    $data = array();
    while ($row = pg_fetch_array($result)) {
        $id = $row['id'];
        $nome = $row['nome'];
        $celular = $row['celular'];
        $nome_entidade = $row['nomeentidade'];
        $opcoes = "<p align=center><input id=btnAprovar type=\"image\" src=\"../diretoria/images/aprovar.png\" data-toggle=\"tooltip\" title=\"Aprovar Cadastro\" width=\"25px\" height=\"25px\" codigo=" . $row['id'] . " onclick=\"aprovarCadastro($(this).attr('codigo'))\"/>
                   <input class=btnVerFicha type=\"image\" src=\"../diretoria/images/ficha.png\" width=\"25px\"  data-toggle=\"tooltip\" title=\"Ver Ficha\" height=\"25px\" codigo=" . $row['id'] . " onclick=\"verFicha($(this).attr('codigo'))\"/> </p>";


        $data['data'][] = array($id, $nome, $celular, $nome_entidade, $opcoes);
    }

    echo json_encode($data);
}

function getFichaAssociadoPendente($codigo) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "select a.id, a.cpf, a.rg, a.nome, a.endereco, es.nome as nomeestado, u.imagem_perfil, ci.nome as nomecidade,"
                . "a.bairro, a.cep, a.telefone, a.celular, a.email, a.curso, se.descricao as semestre, pa.descricao as "
                . "parada, en.nome as entidade, a.tituloeleitor, a.dtnascimento, a.zonaeleitoral, a.secaoeleitoral,"
                . "a.matricula, a.tiposanguineo, a.diapagamento, a.comprovantematricula, a.fototituloeleitor,"
                . "a.observacoesaluno, h.segfev, h.terfev, h.quafev, h.quifev, h.sexfev, h.sabfev,"
                . "h.segmar, h.termar, h.quamar, h.quimar, h.sexmar, h.sabmar,"
                . "h.segabr, h.terabr, h.quaabr, h.quiabr, h.sexabr, h.sababr, h.segmai, h.termai,"
                . "h.quamai, h.quimai, h.sexmai, h.sabmai, h.segjun, h.terjun, h.quajun, h.quijun,"
                . "h.sexjun, h.sabjun, h.segjul, h.terjul, h.quajul, h.quijul, h.sexjul, h.sabjul "
                . "from associado a inner join entidade en on en.id = a.identidade inner join parada pa on pa.id = a.idparada"
                . " inner join semestre se on se.id = a.idsemestre inner join cidade ci on ci.id = a.idcidade inner join "
                . "estado es on es.id = a.idestado inner join usuario u on u.id_associado = a.id "
                . "inner join horarios h on h.id_associado = a.id where a.id = " . $codigo;
        $conexao->Executar($sql);
        $result = $conexao->MontarResultados();
        $json = json_encode($result);
        echo $json;
    } catch (Exception $e) {
        echo $e;
    }
}

function buscaDadosAprovacao($codigo) {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from associado where id = " . $codigo;
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function enviarEmailConfirmacao($nome, $email) {
    // Inclui o arquivo class.phpmailer.php localizado na pasta class
    require_once("../funcoes/classPHPMailer/class.phpmailer.php");

    // Inicia a classe PHPMailer
    $mail = new PHPMailer(true);

    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP

    try {
        $mail->Host = 'email-ssl.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
        $mail->SMTPAuth = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
        $mail->Port = 587; //  Usar 587 porta SMTP
        $mail->Username = 'contato@auedi.com.br'; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = 'AU2017EDI'; // Senha do servidor SMTP (senha do email usado)
        
        //Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
        $mail->SetFrom('contato@auedi.com.br', 'Contato AUEDI'); //Seu e-mail
        $mail->AddReplyTo('contato@auedi.com.br', 'Contato AUEDI'); //Seu e-mail
        $mail->Subject = 'Confirmação de Inscrição'; //Assunto do e-mail
        $mail->CharSet = 'UTF-8';
        
        //Define os destinatário(s)
        //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($email, $nome);

        //Campos abaixo são opcionais 
        //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
        //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
        //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
        //Define o corpo do email
        $mail->MsgHTML('<b>Boas notícias '.$nome.'!</b><br/><br>'
                . 'O seu cadastro foi aprovado.<br> A partir de agora você já pode acessar o sistema '
                . 'do associado através do <a href="http://www.auedi.com.br">link</a>.'
                . '<br/>Em caso de dúvidas, entre em contato '
                . 'com a diretoria. <br/><br/> <span style="color: #a0a0a0">---- ESSE É UM E-MAIL AUTOMÁTICO DO SISTEMA TEASSOCIA. NÃO RESPONDA. ----</span>');

        ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
        //$mail->MsgHTML(file_get_contents('arquivo.html'));

        $mail->Send();
        echo "Mensagem enviada com sucesso</p>\n";

        //caso apresente algum erro é apresentado abaixo com essa exceção.
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }
}

function atualizarStatus($codigo){
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "update associado set status = 1 where id = " . $codigo;
    $conexao->Executar($sql);
    
}
