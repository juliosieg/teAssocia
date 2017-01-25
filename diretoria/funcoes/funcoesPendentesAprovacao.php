<?php

$funcao = $_POST['funcao'];

switch ($funcao) {

    case "getTodos":
        getTodos();
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
        $opcoes = "<p align=center><input id=btnAprovar type=\"image\" src=\"../diretoria/images/aprovar.png\" data-toggle=\"tooltip\" title=\"Aprovar Cadastro\" width=\"25px\" height=\"25px\" codigo=" . $row['id'] . " onclick=\"aprovar($(this).attr('codigo'))\"/>
                   <input class=btnVerFicha type=\"image\" src=\"../diretoria/images/ficha.png\" width=\"25px\"  data-toggle=\"tooltip\" title=\"Ver Ficha\" height=\"25px\" codigo=" . $row['id'] . " onclick=\"verFicha($(this).attr('codigo'))\"/> </p>";


        $data['data'][] = array($id, $nome, $celular, $nome_entidade, $opcoes);
    }

    echo json_encode($data);
}
