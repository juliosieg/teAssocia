<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

include 'conexao.php';

if ($email != null && $email != "" && $senha != null && $senha != "") {

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $s = filter_var($senha, FILTER_SANITIZE_STRING);

    $senha = hash('whirlpool', $senha);

    $conexao = new Conexao();
    $conexao->Conexao();

    $sql = "SELECT u.email FROM usuario u WHERE u.email = '$email'";

    $conexao->Executar($sql);
    $linhas = $conexao->ContarLinhas();

    if ($linhas <= 0) {
        $result[] = array("ret" => false, "msg" => "Usuário não cadastrado!");
        echo json_encode($result);
        $conexao->Fechar();
        exit(0);
    } else {

        $sql = "SELECT u.id FROM usuario u WHERE u.email ='$email' AND u.senha ='$senha'";

        $conexao->Executar($sql);
        $linhas = $conexao->ContarLinhas();

        if ($linhas <= 0) {
            $result[] = array("ret" => false, "msg" => "Senha incorreta!");
            echo json_encode($result);
            $conexao->Fechar();
            exit();
        }

        if ($linhas == 1) {

            $sql = "SELECT a.nome, u.imagem_perfil, u.perfil, a.status from usuario u INNER JOIN associado a ON a.id = u.id_associado WHERE u.email ='" . $email . "'";

            $resultado = $conexao->Executar($sql);

            while ($row = pg_fetch_array($resultado)) {

                $status = $row['status'];
                $imagem = $row['imagem_perfil'];
                $perfil = $row['perfil'];
                $nome = $row['nome'];
            }

            if ($status == '2') {
                $result[] = array("ret" => false, "msg" => "Cadastro Inativo. Contate a Diretoria para solicitar ativação do cadastro.");
                echo json_encode($result);
                $conexao->Fechar();
                exit();
            } else {

                session_start();
                $_SESSION['nomeLogado'] = $nome;
                $_SESSION['imagemLogado'] = $imagem;
                $_SESSION['logado'] = TRUE;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

                $conexao->Fechar();

                $result[] = array("ret" => true, "msg" => "Bem vindo!", "perfil" => $perfil);
                echo json_encode($result);
                exit(0);
            }
        }
    }
} else {

    $result[] = array("ret" => false, "msg" => "Email e/ou senha nulos!");
    echo json_encode($result);
}

