<?php

class Conexao {

    var $user = "te_associa";
    var $pass = "juliosieg1152";
    var $host = "te_associa.postgresql.dbaas.com.br";
    var $port = "5432";
    var $dbname = "te_associa";
    var $link;
    var $result;

    // Metodo construtor
    function Conexao() {
        $this->link = pg_connect("host='$this->host' port='$this->port' dbname='$this->dbname' user='$this->user' password='$this->pass'") or die("Configuracao de Banco de Dados Errada!");
    }

    // Executa query
    function Executar($sql) {
        $this->result = pg_exec($sql) or die("Erro ao executar query");

        return $this->result;
    }

    function MontarResultados() {
        $resultArray = pg_fetch_all($this->result);
        return $resultArray;
    }

    // Numero de linhas retornada na consulta
    function ContarLinhas() {
        $lines = pg_num_rows($this->result);
        return $lines;
    }

    // Fecha conexao
    function Fechar() {
        pg_close($this->link);
    }

    // Libera consulta da memoria
    function Liberar() {
        pg_free_result($this->result);
    }

}

?>
