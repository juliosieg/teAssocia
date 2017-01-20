<?php

session_start();

$funcao = $_POST['funcao'];

if (isset($_POST["descricao"])) {
    $descricao = $_POST["descricao"];
}

if (isset($_POST["quilometragem"])) {
    $quilometragem = $_POST["quilometragem"];
}

if (isset($_POST["tipoCombustivel"])) {
    $tipoCombustivel = $_POST["tipoCombustivel"];
}

if (isset($_POST["cor"])) {
    $cor = $_POST["cor"];
}

if (isset($_POST["anoModelo"])) {
    $anoModelo = $_POST["anoModelo"];
}

if (isset($_POST["anoFabricacao"])) {
    $anoFabricacao = $_POST["anoFabricacao"];
}

if (isset($_POST["modeloCarro"])) {
    $modeloCarro = $_POST["modeloCarro"];
}
if (isset($_POST["tipoCarro"])) {
    $tipoCarro = $_POST["tipoCarro"];
}

if (isset($_POST["versaoCarro"])) {
    $versaoCarro = $_POST["versaoCarro"];
}

if (isset($_POST["observacaoCarro"])) {
    $observacaoCarro = $_POST["observacaoCarro"];
}

if (isset($_POST["preco"])) {
    $preco = $_POST["preco"];
}

if (isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"];
}

if (isset($_POST["codigoDestaquePrincipalNovo"])) {
    $codigoDestaquePrincipalNovo = $_POST["codigoDestaquePrincipalNovo"];
}

if (isset($_POST["codigoDestaquePrincipalAnterior"])) {
    $codigoDestaquePrincipalAnterior = $_POST["codigoDestaquePrincipalAnterior"];
}

if (isset($_POST["codigoAnterior"])) {
    $codigoAnterior = $_POST["codigoAnterior"];
}

if (isset($_POST["codigoNovo"])) {
    $codigoNovo = $_POST["codigoNovo"];
}

if (isset($_POST["codigoDestaque"])) {
    $codigoDestaque = $_POST["codigoDestaque"];
}

if (isset($_POST["opcionais"])) {
    $opcionais = $_POST["opcionais"];
}

if (isset($_POST["codigoEditar"])) {
    $codigoEditar = $_POST["codigoEditar"];
}

if (isset($_POST["quilometragemEditarCarro"])) {
    $quilometragemEditarCarro = $_POST["quilometragemEditarCarro"];
}

if (isset($_POST["tipoCombustivelEditarCarro"])) {
    $tipoCombustivelEditarCarro = $_POST["tipoCombustivelEditarCarro"];
}

if (isset($_POST["modeloEditarCarro"])) {
    $modeloEditarCarro = $_POST["modeloEditarCarro"];
}

if (isset($_POST["tipoEditarCarro"])) {
    $tipoEditarCarro = $_POST["tipoEditarCarro"];
}

if (isset($_POST["corEditarCarro"])) {
    $corEditarCarro = $_POST["corEditarCarro"];
}

if (isset($_POST["anoFabricacaoEditarCarro"])) {
    $anoFabricacaoEditarCarro = $_POST["anoFabricacaoEditarCarro"];
}

if (isset($_POST["anoModeloEditarCarro"])) {
    $anoModeloEditarCarro = $_POST["anoModeloEditarCarro"];
}

if (isset($_POST["precoEditarCarro"])) {
    $precoEditarCarro = $_POST["precoEditarCarro"];
}

if (isset($_POST["versaoEditarCarro"])) {
    $versaoEditarCarro = $_POST["versaoEditarCarro"];
}

if (isset($_POST["observacoesEditarCarro"])) {
    $observacoesEditarCarro = $_POST["observacoesEditarCarro"];
}

if (isset($_POST["opcionaisEditar"])) {
    $opcionaisEditar = $_POST["opcionaisEditar"];
}

switch ($funcao) {

    case "inserir":
        inserirNovoCarro($descricao, $quilometragem, $tipoCombustivel, $cor, $anoModelo, $anoFabricacao, $modeloCarro, $tipoCarro, $versaoCarro, $observacaoCarro, $preco);
        break;
    case "inserirOpcionais":
        inserirOpcionais($opcionais);
        break;
    case "getTodos":
        getTodos();
        break;
    case "excluir":
        excluir($codigo);
        break;
    case "alteraDestaquePrincipal":
        alteraDestaquePrincipal($codigoDestaquePrincipalAnterior, $codigoDestaquePrincipalNovo);
        break;
    case "adicionaDestaqueCarro":
        adicionaDestaqueCarro($codigoDestaque);
        break;
    case "retiraDestaqueCarro":
        retiraDestaqueCarro($codigoAnterior, $codigoNovo);
        break;
    case "buscaCarrosSemDestaque":
        buscaCarrosSemDestaque();
        break;
    case "getTodosModelos":
        getTodosModelos();
        break;
    case "getTodosTipos":
        getTodosTipos();
        break;
    case "getTodosOpcionais":
        getTodosOpcionais();
        break;
    case "pesquisaCodigo":
        pesquisaCodigo($codigo);
        break;
    case "salvarAlteracoes":
        salvarAlteracoes($codigoEditar, $quilometragemEditarCarro, $tipoCombustivelEditarCarro, $modeloEditarCarro, $tipoEditarCarro, $corEditarCarro, $anoFabricacaoEditarCarro, $anoModeloEditarCarro, $precoEditarCarro, $versaoEditarCarro, $observacoesEditarCarro, $opcionaisEditar);
        break;
    case "buscaOpcionaisCodigo":
        buscaOpcionaisCodigo($codigo);
        break;
}

function inserirNovoCarro($descricao, $quilometragem, $tipoCombustivel, $cor, $anoModelo, $anoFabricacao, $modeloCarro, $tipoCarro, $versaoCarro, $observacaoCarro, $preco) {

    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();

    $sql = "select last_value from carro_id_seq";
    $conexao->Executar($sql);

    $result = $conexao->MontarResultados();

    if ($result[0]['last_value'] != null && $result[0]['last_value'] != "") {
        $proximoCarro = $result[0]['last_value'] + 1;
    } else {
        $proximoCarro = 1;
    }

    $pasta_dir = "../images/fotosCarros/"; //diretorio dos arquivos
//se nao existir a pasta ele cria uma
    if (!file_exists($pasta_dir)) {
        mkdir($pasta_dir);
    }

    $fotoPrincipal = $_FILES["fotoPrincipal"];
    $fotoAdicional1 = $_FILES["fotoAdicional1"];
    $fotoAdicional2 = $_FILES["fotoAdicional2"];
    $fotoAdicional3 = $_FILES["fotoAdicional3"];

    $extP = pathinfo($fotoPrincipal['name'], PATHINFO_EXTENSION);
    $ext1 = pathinfo($fotoAdicional1['name'], PATHINFO_EXTENSION);
    $ext2 = pathinfo($fotoAdicional2['name'], PATHINFO_EXTENSION);
    $ext3 = pathinfo($fotoAdicional3['name'], PATHINFO_EXTENSION);

    $nomeComumP = "carro" . $proximoCarro . 'Principal.' . $extP;
    $nomeComum1 = "carro" . $proximoCarro . 'Adicional1.' . $extP;
    $nomeComum2 = "carro" . $proximoCarro . 'Adicional2.' . $extP;
    $nomeComum3 = "carro" . $proximoCarro . 'Adicional3.' . $extP;

    $arquivo_nome_principal = $pasta_dir . $nomeComumP;
    $arquivo_nome_1 = $pasta_dir . $nomeComum1;
    $arquivo_nome_2 = $pasta_dir . $nomeComum2;
    $arquivo_nome_3 = $pasta_dir . $nomeComum3;

//Faz o upload da imagem
    move_uploaded_file($fotoPrincipal["tmp_name"], $arquivo_nome_principal);
    move_uploaded_file($fotoAdicional1["tmp_name"], $arquivo_nome_1);
    move_uploaded_file($fotoAdicional2["tmp_name"], $arquivo_nome_2);
    move_uploaded_file($fotoAdicional3["tmp_name"], $arquivo_nome_3);
    
    try {
        $sql = "insert into carro(titulo, quilometragem, combustivel, cor, ano_modelo, ano_fabricacao, observacoes,"
                . "foto_1, foto_2, foto_3, foto_4, id_modelo, id_tipo, versao, status, preco) "
                . "values('" . $descricao . "', '" . $quilometragem . "', '" . $tipoCombustivel . "',"
                . "'" . $cor . "', '" . $anoModelo . "', '" . $anoFabricacao . "',"
                . "'" . $observacaoCarro . "', '" . $arquivo_nome_principal . "', '" . $arquivo_nome_1 . "',"
                . "'" . $arquivo_nome_2 . "', '" . $arquivo_nome_3 . "', '" . $modeloCarro . "', '" . $tipoCarro . "',"
                . "'" . $versaoCarro . "', 'EM ESTOQUE', '" . $preco . "')";

        $conexao->Executar($sql);

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Carro: " . $descricao . " inserido','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'OK';
    } catch (Exception $e) {

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao inserir carro: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo $e;
    }


    $conexao->Liberar();
    $conexao->Fechar();
}

function inserirOpcionais($opcionais) {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();

    $sql = "select last_value from carro_id_seq";
    $conexao->Executar($sql);

    $result = $conexao->MontarResultados();

    $proximoCarro = $result[0]['last_value'];

    try {
        foreach ($opcionais as $value) {
            $sql = "insert into carro_opcionais(id_carro, id_opcionais) "
                    . "values(" . $proximoCarro . ", " . $value . ")";
            $conexao->Executar($sql);

            $sql = "INSERT INTO logs (log, usuario, data_hora) values('Opcional " . $value . " inserido com sucesso no carro " . $proximoCarro . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
            $conexao->Executar($sql);
        }
        echo "OK";
    } catch (Exception $ex) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao inserir opcionais no carro: " . $ex->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo $ex;
    }

    $conexao->Liberar();
    $conexao->Fechar();
}

function getTodos() {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $result = $conexao->Executar("select c.id, c.ano_fabricacao, c.ano_modelo, mo.descricao as modelo, ma.descricao as marca, c.foto_1 as caminho, c.preco, c.destaque, c.titulo
                        from carro c
                        inner join modelo mo
                        on c.id_modelo = mo.id
                        inner join marca ma
                        on mo.id_marca = ma.id
                        where c.status = 'EM ESTOQUE'
                        ");

    $data = array();
    while ($row = pg_fetch_array($result)) {
        $id = $row['id'];
        $marca = $row['marca'];
        $modelo = $row['modelo'];
        $ano_fabricacao = $row['ano_fabricacao'];
        $ano_modelo = $row['ano_modelo'];
        $preco = 'R$ ' . number_format($row['preco'], 2, ',', '.');
        
        $caminho = $row['caminho'];

        $opcoes = "<p align=center><input id=btnVisualizar type=\"image\" src=\"../images/preview.png\" width=\"18px\" height=\"18px\" caminho=" . $row['caminho'] . " codigo=" . $row['id'] . " onclick=\"visualizarImagem($(this).attr('caminho'))\"/>
                   <input class=btnAlterar type=\"image\" src=\"../images/edit.png\" width=\"18px\" height=\"18px\" codigo=" . $row['id'] . " onclick=\"alterar($(this).attr('codigo'))\"/>
                   <input class=btnExcluir type=\"image\" src=\"../images/delete.png\" width=\"18px\" height=\"18px\" codigo=" . $row['id'] . " onclick=\"excluir($(this).attr('codigo'))\"/> </p>";

        $data['data'][] = array($id, $marca, $modelo, $ano_fabricacao, $ano_modelo, $preco, $opcoes);
    }

    echo json_encode($data);
}

function excluir($codigo) {
    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "update carro set status = 'EXCLUIDO' where id = " . $codigo;
        $conexao->Executar($sql);

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Carro " . $codigo . " excluído com sucesso','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao excluir carro: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);
        
        echo 'Erro ao excluir carro: ', $e->getMessage(), "\n";
    }

    echo 'OK';
    $conexao->Liberar();
    $conexao->Fechar();
}

function getTodosModelos() {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();

    $conexao->Executar("select m.id, m.descricao as descModelo, ma.descricao as descMarca, ca.descricao as descCategoria from modelo m inner join marca ma on ma.id = m.id_marca inner join categoria ca on ca.id = m.id_categoria order by ma.descricao, m.descricao");

    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function getTodosTipos() {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $conexao->Executar("select * from tipo order by descricao");
    $result = $conexao->MontarResultados();

    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function getTodosOpcionais() {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $conexao->Executar("select * from opcionais order by descricao");
    $result = $conexao->MontarResultados();

    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function pesquisaCodigo($codigo) {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $sql = "select * from carro where id = " . $codigo;
    $conexao->Executar($sql);
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}

function salvarAlteracoes($codigoEditar, $quilometragemEditarCarro, $tipoCombustivelEditarCarro, $modeloEditarCarro, $tipoEditarCarro, $corEditarCarro, $anoFabricacaoEditarCarro, $anoModeloEditarCarro, $precoEditarCarro, $versaoEditarCarro, $observacoesEditarCarro, $opcionaisEditar) {
    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "update carro set quilometragem = '" . $quilometragemEditarCarro . "', combustivel = '" . $tipoCombustivelEditarCarro . "', "
                . "id_modelo = " . $modeloEditarCarro . ", id_tipo = " . $tipoEditarCarro . ", "
                . "cor = '" . $corEditarCarro . "', ano_fabricacao = '" . $anoFabricacaoEditarCarro . "', "
                . "ano_modelo = '" . $anoModeloEditarCarro . "', preco = '" . $precoEditarCarro . "',"
                . "versao = '" . $versaoEditarCarro . "', observacoes = '" . $observacoesEditarCarro . "' where id = " . $codigoEditar;
        
        $conexao->Executar($sql);

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Carro " . $codigoEditar . " alterado com sucesso','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);
    } catch (Exception $e) {

        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao alterar carro: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'Erro ao alterar carro: ', $e->getMessage(), "\n";
        exit(0);
    }

    try {
        $sql = "delete from carro_opcionais where id_carro = " . $codigoEditar;
        $conexao->Executar($sql);
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Todos opcionais deletados do carro','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao alterar carro: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'Erro ao alterar carro: ', $e->getMessage(), "\n";
        exit(0);
    }

    try {
        foreach ($opcionaisEditar as $value) {
            $sql = "insert into carro_opcionais(id_carro, id_opcionais) "
                    . "values(" . $codigoEditar . ", " . $value . ")";
            $conexao->Executar($sql);
        }
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Opcionais adicionados ao carro','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo "OK";
    } catch (Exception $e) {
        $sql = "INSERT INTO logs (log, usuario, data_hora) values('Erro ao alterar carro: " . $e->getMessage() . "','" . $_SESSION['nomeLogado'] . "','" . date("d-m-Y H:m") . "')";
        $conexao->Executar($sql);

        echo 'Erro ao alterar carro: ', $e->getMessage(), "\n";
        exit(0);
    }

    $conexao->Liberar();
    $conexao->Fechar();
}

function buscaOpcionaisCodigo($codigo) {
    include 'conexao.php';

    $conexao = new Conexao(); // Abre conexao
    $conexao->Conexao();
    $conexao->Executar("select o.* from opcionais o inner join carro_opcionais co on co.id_opcionais = o.id"
            . " inner join carro c on c.id = co.id_carro where co.id_carro = " . $codigo . " order by o.descricao");
    $result = $conexao->MontarResultados();
    $conexao->Liberar();
    $conexao->Fechar();
    $json = json_encode($result);

    echo $json;
}
?>

