<?php

$funcao = $_POST['funcao'];

if (isset($_POST['idEstado'])) {
    $idEstado = $_POST['idEstado'];
}

if (isset($_POST['consultaCpf'])) {
    $consultaCpf = $_POST['consultaCpf'];
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
        cadastraAssociado($entidadeAluno, $paradaAluno, $semestreAluno, $cursoAluno, $emailAluno, $celularAluno, $telefoneAluno, $cepAluno, $bairroAluno, $cidadeAluno, $ufAluno, $enderecoAluno, $cpfAluno, $nomeAluno, $rgAluno, $senhaAluno);
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

function cadastraAssociado($entidadeAluno, $paradaAluno, $semestreAluno, $cursoAluno, $emailAluno, 
        $celularAluno, $telefoneAluno, $cepAluno, $bairroAluno, $cidadeAluno, $ufAluno, 
        $enderecoAluno, $cpfAluno, $nomeAluno, $rgAluno, $senhaAluno) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();
    
    $senhaComHash = hash("whirlpool", $senhaAluno);
    
    try {
        $sql = "insert into associado(cpf, rg, nome, endereco, bairro, cep, telefone, celular, email, curso, idsemestre, idparada, identidade, idcidade, idestado, senhaAluno) "
                . "values(" . $cpfAluno . "," . $rgAluno . ",'" . $nomeAluno . "','" . $enderecoAluno . "','" . $bairroAluno . "', '" . $cepAluno . "', '" . $telefoneAluno . "', '" . $celularAluno . "', '" . $emailAluno . "', '" . $cursoAluno . "', " . $semestreAluno . ", " . $paradaAluno . ", " . $entidadeAluno . ", " . $cidadeAluno . ", " . $ufAluno . ", '". $senhaComHash ."'  )";
        $conexao->Executar($sql);
        echo "OK";

        
    } catch (Exception $e) {
        echo $e;
    }

    $conexao->Liberar();
    $conexao->Fechar();
}
?>

