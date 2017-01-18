<?php

session_start();

$funcao = $_POST['funcao'];

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
}

if (isset($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
}

if (isset($_POST['acessos'])) {
    $acessos = $_POST['acessos'];
} else {
    $acessos = null;
}

switch ($funcao) {

    case "getTodos":
        getTodos();
        break;
    case "pesquisaCodigo":
        pesquisaCodigo($codigo);
        break;
    case "salvarAlteracoes":
        salvarAlteracoes($codigo, $descricao);
        break;
    case "excluir":
        excluir($codigo);
        break;
    case "inserir":
        inserir($descricao);
        break;
    case "buscaAcessos":
        buscaAcessos($codigo);
        break;
    case "salvarAcessos":
        salvarAcessos($codigo, $acessos);
        break;
}

function getTodos() {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $result = $conexao->Executar("select * from perfil order by descricao");

    $data = array();
    while ($row = pg_fetch_array($result)) {
        $id = $row['id'];
        $descricao = $row['descricao'];
        $opcoes = "<input class=btnAlterar type=\"image\" src=\"../images/edit.png\" width=\"18px\" height=\"18px\" codigo=" . $row['id'] . " onclick=\"alterar($(this).attr('codigo'))\"/>
        <input class=btnExcluir type=\"image\" src=\"../images/delete.png\" width=\"18px\" height=\"18px\" codigo=" . $row['id'] . " onclick=\"excluir($(this).attr('codigo'))\"/>
        <input class=btnGerenciarAcessos type=\"image\" src=\"../images/key.png\" width=\"18px\" height=\"18px\" codigo=" . $row['id'] . " onclick=\"gerenciarAcessos($(this).attr('codigo'))\"/> ";
        $data['data'][] = array($id, $descricao, $opcoes);
    }
    echo json_encode($data);
}

function pesquisaCodigo($codigo) {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from perfil where id = " . $codigo;
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function salvarAlteracoes($codigo, $descricao) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "update perfil set descricao = '" . $descricao . "' where id = " . $codigo;
        $conexao->Executar($sql);

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Perfil " . $codigo . " alterado com sucesso','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'OK';
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao alterar perfil: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'Erro ao alterar perfil: ', $e->getMessage(), "\n";
    }

    $conexao->Liberar();
    $conexao->Fechar();
}

function excluir($codigo) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "delete from perfil where id = " . $codigo;
        $conexao->Executar($sql);

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Perfil " . $codigo . " excluído com sucesso','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'OK';
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao excluir perfil: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'Erro ao excluir perfil. Lembre-se de retirar os acessos e alterar o perfil dos usuários vinculados.';
    }

    $conexao->Liberar();
    $conexao->Fechar();
}

function inserir($descricao) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();
    try {
        $sql = "insert into perfil(descricao) values('" . $descricao . "')";
        $conexao->Executar($sql);

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Perfil: " . $descricao . " inserido com sucesso','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'OK';
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao inserir perfil: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo $e;
    }
    $conexao->Liberar();
    $conexao->Fechar();
}

function buscaAcessos($codigo) {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select id_acesso from perfil_acesso where id_perfil = " . $codigo;
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function salvarAcessos($codigo, $acessos) {
    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "delete from perfil_acesso where id_perfil = " . $codigo;
        $conexao->Executar($sql);
    } catch (Exception $e) {
        echo 'Erro ao alterar perfil: ', $e->getMessage(), "\n";
        exit(0);
    }

    $contaAcessos = count($acessos);

    if ($contaAcessos <= 0) {
        echo "OK";
        exit(0);
    }

    try {
        foreach ($acessos as $value) {
            $sql = "insert into perfil_acesso(id_perfil, id_acesso) "
                    . "values(" . $codigo . ", " . $value . ")";
            $conexao->Executar($sql);
        }
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Acessos para o perfil " . $codigo . " alterados com sucesso','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo "OK";
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao alterar acessos do perfil " . $codigo . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'Erro ao alterar perfil: ', $e->getMessage(), "\n";
        exit(0);
    }

    $conexao->Liberar();
    $conexao->Fechar();
}
?>

