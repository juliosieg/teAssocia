<?php

class Conexao {

    var $user = "auedi2017";
    var $pass = "au2017edi";
    var $host = "auedi2017.postgresql.dbaas.com.br";
    var $port = "5432";
    var $dbname = "auedi2017";
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
