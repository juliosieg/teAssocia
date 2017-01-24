<?php

$funcao = $_POST['funcao'];
if (isset($_POST['idEstado'])) {
    $idEstado = $_POST['idEstado'];
}

if (isset($_POST['consultaCpf'])) {
    $consultaCpf = $_POST['consultaCpf'];
}

if (isset($_POST['zonaEleitoralAluno'])) {
    $zonaEleitoralAluno = $_POST['zonaEleitoralAluno'];
}

if (isset($_POST['tituloEleitoralAluno'])) {
    $tituloEleitoralAluno = $_POST['tituloEleitoralAluno'];
}

if (isset($_POST['secaoEleitoralAluno'])) {
    $secaoEleitoralAluno = $_POST['secaoEleitoralAluno'];
}

if (isset($_POST['dataNascimentoAluno'])) {
    $dataNascimentoAluno = $_POST['dataNascimentoAluno'];
}

if (isset($_POST['melhorDiaPagamento'])) {
    $melhorDiaPagamento = $_POST['melhorDiaPagamento'];
}

if (isset($_POST['matriculaAluno'])) {
    $matriculaAluno = $_POST['matriculaAluno'];
}

if (isset($_POST['tipoSanguineoAluno'])) {
    $tipoSanguineoAluno = $_POST['tipoSanguineoAluno'];
}

if (isset($_POST['observacoesAluno'])) {
    $observacoesAluno = $_POST['observacoesAluno'];
}

if (isset($_POST['segFev'])) {
    $segFev = $_POST['segFev'];
}

if (isset($_POST['terFev'])) {
    $terFev = $_POST['terFev'];
}

if (isset($_POST['quaFev'])) {
    $quaFev = $_POST['quaFev'];
}

if (isset($_POST['quiFev'])) {
    $quiFev = $_POST['quiFev'];
}

if (isset($_POST['sexFev'])) {
    $sexFev = $_POST['sexFev'];
}

if (isset($_POST['sabFev'])) {
    $sabFev = $_POST['sabFev'];
}

if (isset($_POST['segMar'])) {
    $segMar = $_POST['segMar'];
}

if (isset($_POST['terMar'])) {
    $terMar = $_POST['terMar'];
}

if (isset($_POST['quaMar'])) {
    $quaMar = $_POST['quaMar'];
}

if (isset($_POST['quiMar'])) {
    $quiMar = $_POST['quiMar'];
}

if (isset($_POST['sexMar'])) {
    $sexMar = $_POST['sexMar'];
}

if (isset($_POST['sabMar'])) {
    $sabMar = $_POST['sabMar'];
}

if (isset($_POST['segAbr'])) {
    $segAbr = $_POST['segAbr'];
}

if (isset($_POST['terAbr'])) {
    $terAbr = $_POST['terAbr'];
}

if (isset($_POST['quaAbr'])) {
    $quaAbr = $_POST['quaAbr'];
}

if (isset($_POST['quiAbr'])) {
    $quiAbr = $_POST['quiAbr'];
}

if (isset($_POST['sexAbr'])) {
    $sexAbr = $_POST['sexAbr'];
}

if (isset($_POST['sabAbr'])) {
    $sabAbr = $_POST['sabAbr'];
}

if (isset($_POST['segMai'])) {
    $segMai = $_POST['segMai'];
}

if (isset($_POST['terMai'])) {
    $terMai = $_POST['terMai'];
}

if (isset($_POST['quaMai'])) {
    $quaMai = $_POST['quaMai'];
}

if (isset($_POST['quiMai'])) {
    $quiMai = $_POST['quiMai'];
}

if (isset($_POST['sexMai'])) {
    $sexMai = $_POST['sexMai'];
}

if (isset($_POST['sabMai'])) {
    $sabMai = $_POST['sabMai'];
}

if (isset($_POST['segJun'])) {
    $segJun = $_POST['segJun'];
}

if (isset($_POST['terJun'])) {
    $terJun = $_POST['terJun'];
}

if (isset($_POST['quaJun'])) {
    $quaJun = $_POST['quaJun'];
}

if (isset($_POST['quiJun'])) {
    $quiJun = $_POST['quiJun'];
}

if (isset($_POST['sexJun'])) {
    $sexJun = $_POST['sexJun'];
}

if (isset($_POST['sabJun'])) {
    $sabJun = $_POST['sabJun'];
}

if (isset($_POST['segJul'])) {
    $segJul = $_POST['segJul'];
}

if (isset($_POST['terJul'])) {
    $terJul = $_POST['terJul'];
}

if (isset($_POST['quaJul'])) {
    $quaJul = $_POST['quaJul'];
}

if (isset($_POST['quiJul'])) {
    $quiJul = $_POST['quiJul'];
}

if (isset($_POST['sexJul'])) {
    $sexJul = $_POST['sexJul'];
}

if (isset($_POST['sabJul'])) {
    $sabJul = $_POST['sabJul'];
}

if (isset($_POST['entidadeAluno'])) {
    $entidadeAluno = $_POST['entidadeAluno'];
}

if (isset($_POST['paradaAluno'])) {
    $paradaAluno = $_POST['paradaAluno'];
}

if (isset($_POST['semestreAluno'])) {
    $semestreAluno = $_POST['semestreAluno'];
}

if (isset($_POST['cursoAluno'])) {
    $cursoAluno = $_POST['cursoAluno'];
}

if (isset($_POST['emailAluno'])) {
    $emailAluno = $_POST['emailAluno'];
}

if (isset($_POST['celularAluno'])) {
    $celularAluno = $_POST['celularAluno'];
}

if (isset($_POST['telefoneAluno'])) {
    $telefoneAluno = $_POST['telefoneAluno'];
}

if (isset($_POST['cepAluno'])) {
    $cepAluno = $_POST['cepAluno'];
}

if (isset($_POST['bairroAluno'])) {
    $bairroAluno = $_POST['bairroAluno'];
}

if (isset($_POST['cidadeAluno'])) {
    $cidadeAluno = $_POST['cidadeAluno'];
}

if (isset($_POST['ufAluno'])) {
    $ufAluno = $_POST['ufAluno'];
}

if (isset($_POST['enderecoAluno'])) {
    $enderecoAluno = $_POST['enderecoAluno'];
}

if (isset($_POST['cpfAluno'])) {
    $cpfAluno = $_POST['cpfAluno'];
}

if (isset($_POST['nomeAluno'])) {
    $nomeAluno = $_POST['nomeAluno'];
}

if (isset($_POST['rgAluno'])) {
    $rgAluno = $_POST['rgAluno'];
}

if (isset($_POST['emailSenha'])) {
    $emailSenha = $_POST['emailSenha'];
}

if (isset($_POST['senhaAluno'])) {
    $senhaAluno = $_POST['senhaAluno'];
}

switch ($funcao) {

    case "carregaEntidades":
        carregaEntidades();
        break;
    case "carregaSemestres":
        carregaSemestres();
        break;
    case "carregaUfs":
        carregaUfs();
        break;
    case "carregaCidades":
        carregaCidades($idEstado);
        break;
    case "carregaParadas":
        carregaParadas();
        break;
    case "consultaCpf":
        consultaCpf($consultaCpf);
        break;
    case "cadastraAssociado":
        cadastraAssociado($entidadeAluno, $paradaAluno, $semestreAluno, $cursoAluno, $emailAluno, $celularAluno, $telefoneAluno, $cepAluno, $bairroAluno, $cidadeAluno, $ufAluno, $enderecoAluno, $cpfAluno, $nomeAluno, $rgAluno, $senhaAluno, $tituloEleitoralAluno, $dataNascimentoAluno, $zonaEleitoralAluno, $secaoEleitoralAluno, $matriculaAluno, $tipoSanguineoAluno, $melhorDiaPagamento, $observacoesAluno, $segFev, $terFev, $quaFev, $quiFev, $sexFev, $sabFev, $segMar, $terMar, $quaMar, $quiMar, $sexMar, $sabMar, $segAbr, $terAbr, $quaAbr, $quiAbr, $sexAbr, $sabAbr, $segMai, $terMai, $quaMai, $quiMai, $sexMai, $sabMai, $segJun, $terJun, $quaJun, $quiJun, $sexJun, $sabJun, $segJul, $terJul, $quaJul, $quiJul, $sexJul, $sabJul);
        break;
}

function carregaEntidades() {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from entidade where status = 1 and id_associacao = 4";
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function carregaSemestres() {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from semestre where status = 1 and id_associacao = 4";
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function carregaUfs() {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from estado";
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function carregaCidades($idEstado) {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from cidade where idestado = " . $idEstado;
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function carregaParadas() {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from parada where status = 1 and id_associacao = 4";
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function consultaCpf($consultaCpf) {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from associado where cpf = " . $consultaCpf;
    $conexao->Executar($sql);
    $result = $conexao->ContarLinhas();
    $conexao->Liberar();
    $conexao->Fechar();

    echo $result;
}

function cadastraAssociado($entidadeAluno, $paradaAluno, $semestreAluno, $cursoAluno, $emailAluno, $celularAluno, $telefoneAluno, $cepAluno, $bairroAluno, $cidadeAluno, $ufAluno, $enderecoAluno, $cpfAluno, $nomeAluno, $rgAluno, $senhaAluno, $tituloEleitoralAluno, $dataNascimentoAluno, $zonaEleitoralAluno, $secaoEleitoralAluno, $matriculaAluno, $tipoSanguineoAluno, $melhorDiaPagamento, $observacoesAluno, $segFev, $terFev, $quaFev, $quiFev, $sexFev, $sabFev, $segMar, $terMar, $quaMar, $quiMar, $sexMar, $sabMar, $segAbr, $terAbr, $quaAbr, $quiAbr, $sexAbr, $sabAbr, $segMai, $terMai, $quaMai, $quiMai, $sexMai, $sabMai, $segJun, $terJun, $quaJun, $quiJun, $sexJun, $sabJun, $segJul, $terJul, $quaJul, $quiJul, $sexJul, $sabJul) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    $senhaComHash = hash("whirlpool", $senhaAluno);

    $pasta_dir = "../docsAssociados/"; //diretorio dos arquivos
    //se nao existir a pasta ele cria uma
    if (!file_exists($pasta_dir)) {
        mkdir($pasta_dir);
    }
    $comprovanteMatricula = $_FILES["comprovanteMatricula"];
    $fototituloeleitor = $_FILES["tituloEleitorFoto"];
    $fotoAluno = $_FILES["fotoAluno"];

    $extComprovante = pathinfo($comprovanteMatricula['name'], PATHINFO_EXTENSION);
    $extTituloEleitor = pathinfo($fototituloeleitor['name'], PATHINFO_EXTENSION);
    $extFoto = pathinfo($fotoAluno['name'], PATHINFO_EXTENSION);

    $nomeComumComprovante = "comprovante" . $cpfAluno . '.' . $extComprovante;
    $nomeComumTituloEleitor = "tituloEleitor" . $cpfAluno . '.' . $extTituloEleitor;
    $nomeComumFoto = "foto" . $cpfAluno . '.' . $extFoto;

    $arquivo_nome_comprovante = $pasta_dir . $nomeComumComprovante;
    $arquivo_nome_titulo = $pasta_dir . $nomeComumTituloEleitor;
    $arquivo_nome_foto = $pasta_dir . $nomeComumFoto;

//Faz o upload da imagem

    move_uploaded_file($comprovanteMatricula["tmp_name"], $arquivo_nome_comprovante);
    move_uploaded_file($fototituloeleitor["tmp_name"], $arquivo_nome_titulo);
    move_uploaded_file($fotoAluno["tmp_name"], $arquivo_nome_foto);

    try {
        $sql = "insert into associado(cpf, rg, nome, endereco, bairro, cep, telefone, celular, email, curso, idsemestre, idparada, identidade, idcidade, idestado, status, tituloeleitor, dtnascimento, zonaeleitoral, secaoeleitoral, matricula, tiposanguineo, diapagamento, comprovantematricula, fototituloeleitor, observacoesAluno) "
                . "values(" . $cpfAluno . "," . $rgAluno . ",'" . $nomeAluno . "','" . $enderecoAluno . "','" . $bairroAluno . "', '" . $cepAluno . "', '" . $telefoneAluno . "', '" . $celularAluno . "', '" . $emailAluno . "', '" . $cursoAluno . "', " . $semestreAluno . ", " . $paradaAluno . ", " . $entidadeAluno . ", " . $cidadeAluno . ", " . $ufAluno . ", 2, '" . $tituloEleitoralAluno . "', '" . $dataNascimentoAluno . "', '" . $zonaEleitoralAluno . "', '" . $secaoEleitoralAluno . "', '" . $matriculaAluno . "', '" . $tipoSanguineoAluno . "', '" . $melhorDiaPagamento . "', '" . $arquivo_nome_comprovante . "', '" . $arquivo_nome_titulo . "', '".$observacoesAluno."')";
        $conexao->Executar($sql);

        $sql = "select id from associado where cpf = " . $cpfAluno;
        $conexao->Executar($sql);
        $result = $conexao->MontarResultados();
        $id = $result[0]['id'];

        $sql = "insert into usuario(senha, id_associado, email, imagem_perfil, perfil) values ('" . $senhaComHash . "'," . $id . ",'".$emailAluno."', '" . $arquivo_nome_foto . "', 1)";
        //No perfil insere 1 pra aluno e 2 pra diretoria
        $conexao->Executar($sql);

        $sql = "insert into horarios(segfev, terfev, quafev, quifev, sexfev, sabfev, segmar, termar, quamar, quimar, sexmar, sabmar, segabr, terabr, quaabr, quiabr, sexabr, sababr, segmai, termai, quamai, quimai, sexmai, sabmai, segjun, terjun, quajun, quijun, sexjun, sabjun, segjul, terjul, quajul, quijul, sexjul, sabjul, id_associado)"
                . "values (" . $segFev . "," . $terFev . "," . $quaFev . "," . $quiFev . "," . $sexFev . "," . $sabFev . ", " . $segMar . "," . $terMar . "," . $quaMar . "," . $quiMar . "," . $sexMar . "," . $sabMar . "," . $segAbr . "," . $terAbr . "," . $quaAbr . "," . $quiAbr . "," . $sexAbr . "," . $sabAbr . "," . $segMai . "," . $terMai . "," . $quaMai . "," . $quiMai . "," . $sexMai . "," . $sabMai . "," . $segJun . "," . $terJun . "," . $quaJun . "," . $quiJun . "," . $sexJun . "," . $sabJun . "," . $segJul . "," . $terJul . "," . $quaJul . "," . $quiJul . "," . $sexJul . "," . $sabJul . ", $id)";
        $conexao->Executar($sql);
        echo "OK";
    } catch (Exception $e) {
        echo $e;
    }

    $conexao->Liberar();
    $conexao->Fechar();
}
?>

