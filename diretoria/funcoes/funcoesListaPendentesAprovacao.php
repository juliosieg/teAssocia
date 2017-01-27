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
        $sql = "select a.id, a.cpf, a.rg, a.nome, a.endereco, es.nome as nomeestado, u.imagem_perfil, ci.nome as nomecidade,"
                . "a.bairro, a.cep, a.telefone, a.celular, a.email, a.curso, se.descricao as semestre, pa.descricao as "
                . "parada, en.nome as entidade, a.tituloeleitor, a.dtnascimento, a.zonaeleitoral, a.secaoeleitoral,"
                . "a.matricula, a.tiposanguineo, a.diapagamento, a.comprovantematricula, a.fototituloeleitor,"
                . "a.observacoesaluno, h.segfev, h.terfev, h.quafev, h.quifev, h.sexfev, h.sabfev,"
                . "h.segmar, h.termar, h.quamar, h.quimar, h.sexmar, h.sabmar,"
                . "h.segabr, h.terabr, h.quaabr, h.quiabr, h.sexabr, h.sababr, h.segmai, h.termai,"
                . "h.quamai, h.quimai, h.sexmai, h.sabmai, h.segjun, h.terjun, h.quajun, h.quijun,"
                . "h.sexjun, h.sabjun, h.segjul, h.terjul, h.quajul, h.quijul, h.sexjul, h.sabjul "
                . "from associado a inner join entidade en on en.id = a.identidade inner join parada pa on pa.id = a.idparada"
                . " inner join semestre se on se.id = a.idsemestre inner join cidade ci on ci.id = a.idcidade inner join "
                . "estado es on es.id = a.idestado inner join usuario u on u.id_associado = a.id "
                . "inner join horarios h on h.id_associado = a.id where a.id = ".$codigo;
        $conexao->Executar($sql);
        $result = $conexao->MontarResultados();
        $json = json_encode($result);
        echo $json;
    } catch (Exception $e) {
        echo $e;
    }
}
