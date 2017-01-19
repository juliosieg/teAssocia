<?php

$funcao = $_POST['funcao'];

if (isset($_POST['idEstado'])) {
    $idEstado = $_POST['idEstado'];
}

if (isset($_POST['consultaCpf'])) {
    $consultaCpf = $_POST['consultaCpf'];
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
    $sql = "select * from associado where cpf = ".$consultaCpf;
    $conexao->Executar($sql);
    $result = $conexao->ContarLinhas();
    $conexao->Liberar();
    $conexao->Fechar();

    echo $result;
}
?>

