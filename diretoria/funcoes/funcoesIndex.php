<?php

$funcao = $_POST['funcao'];
switch ($funcao) {
    case "getAssociadosCadastrados":
        getAssociadosCadastrados();
        break;
    case "getAssociadosPendentes":
        getAssociadosPendentes();
        break;
    case "getAssociadosPorEntidade":
        getAssociadosPorEntidade();
}

function getAssociadosCadastrados() {
    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "select count(id) from associado";
        $conexao->Executar($sql);
        $result = $conexao->MontarResultados();
        $json = json_encode($result);
        echo $json;
    } catch (Exception $e) {
        echo $e;
    }
}

function getAssociadosPendentes() {
    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "select count(id) from associado where status=2";
        $conexao->Executar($sql);
        $result = $conexao->MontarResultados();
        $json = json_encode($result);
        echo $json;
    } catch (Exception $e) {
        echo $e;
    }
}

function getAssociadosPorEntidade() {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "select count(a.identidade) as associados, e.nome from associado a inner join entidade e on e.id = a.identidade group by e.nome";
        $resultado = $conexao->Executar($sql);

        $result = [];
        
        while ($row = pg_fetch_array($resultado)) {

            array_push($result, $row['nome'], $row['associados']);
        }

        $json = json_encode($result);
        echo $json;
        
    } catch (Exception $e) {
        echo $e;
    }
}
