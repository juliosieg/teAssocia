<?php

$funcao = $_POST['funcao'];

if (isset($_POST['sugestao'])) {
    $sugestao = $_POST['sugestao'];
}

switch ($funcao) {

    case "enviarSugestao":
        enviarSugestao($sugestao);
        break;
}

function enviarSugestao($sugestao) {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao

    $conexao->Conexao();

    try {

        $sql = "insert into sugestoes(sugestao) "
                . "values('" . $sugestao . "')";

        $conexao->Executar($sql);

        echo 'OK';
    } catch (Exception $e) {
        echo $e;
    }
}
