<?php

$email = $_POST['email'];
$senha = $_POST['senha'];

include 'conexao.php';

if ($email != null && $email != "" && $senha != null && $senha != "") {

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $s = filter_var($senha, FILTER_SANITIZE_STRING);
    
    $conexao = new Conexao();
    $conexao->Conexao();
    
    $sql = "INSERT INTO log(email, senha, acao) values ('".$email."', '".$senha."', 'LOGIN')";
    $conexao->Executar($sql);

    $senha = hash('whirlpool', $senha);

   
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

            $sql = "SELECT u.imagem_perfil, u.perfil from usuario u WHERE u.email ='" . $email . "'";
            $resultado = $conexao->Executar($sql);

            while ($row = pg_fetch_array($resultado)) {
                
                $imagem = $row['imagem_perfil'];
                $perfil = $row['perfil'];

            }
            
            //Se for perfil de diretoria
            if ($row['perfil'] == 2) {
                $_SESSION['perfil'] = $perfil;
                $_SESSION['logado'] = TRUE;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);

                $conexao->Fechar();

                $result[] = array("ret" => true, "msg" => "Bem vindo!", "perfil" => $perfil);
                echo json_encode($result);
                exit(0);
            } else {

                $sql = "SELECT a.nome, u.imagem_perfil, u.perfil, a.status from usuario u inner join associado a on a.id = u.id_associado WHERE u.email ='" . $email . "'";
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
                    $_SESSION['perfil'] = $perfil;
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
    }
} else {

    $result[] = array("ret" => false, "msg" => "Email e/ou senha nulos!");
    echo json_encode($result);
}

