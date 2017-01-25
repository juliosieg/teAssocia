<?php

$funcao = $_POST['funcao'];

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
}

switch ($funcao) {

    case "getFichaAssociadoPendente":
        getFichaAssociadoPendente($codigo);
        break;
}

function getFichaAssociadoPendente($codigo) {

    include 'conexao.php';

    $conexao = new Conexao();
    $conexao->Conexao();

    try {
        $sql = "select a.id, a.cpf, a.rg, a.nome, a.endereco, es.nome as nomeestado, ci.nome as nomecidade,"
                . "a.bairro, a.cep, a.telefone, a.celular, a.email, a.curso, se.descricao as semestre, pa.descricao as "
                . "parada, en.nome as entidade, a.tituloeleitor, a.dtnascimento, a.zonaeleitoral, a.secaoeleitoral,"
                . "a.matricula, a.tiposanguineo, a.diapagamento, a.comprovantematricula, a.fototituloeleitor,"
                . "a.observacoesaluno from associado a inner join entidade en on en.id = a.identidade inner join parada pa on pa.id = a.idparada"
                . " inner join semestre se on se.id = a.idsemestre inner join cidade ci on ci.id = a.idcidade inner join "
                . "estado es on es.id = a.idestado where a.id = ".$codigo;
        $conexao->Executar($sql);
        $result = $conexao->MontarResultados();
        $json = json_encode($result);
        echo $json;
    } catch (Exception $e) {
        echo $e;
    }
}
