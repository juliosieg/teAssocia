<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    

        <link rel="stylesheet" href="css/cadastro.css">
        <script src="js/cadastro.js"></script>

        <title>Cadastro - teAssocia</title>

    </head>
    <body>

        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <p align="center"><img src="images/logoTeAssocia.png" width="80%"/></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login em <b>Associação das Capivaras</b></h3>
                        </div>
                        <div class="panel-body">
                            <form accept-charset="UTF-8" role="form">

                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="password" type="password" value="">
                                    </div>

                                    <div class="ui-group-buttons" style="padding-left: 20%">
                                        <button type="button" class="btn btn-primary btn-lg">Entrar</button>
                                        <div class="or or-lg"></div>
                                        <button type="button" onclick="abreModalCadastro();" class="btn btn-success btn-lg">Cadastrar</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <div id="modalCadastro" class="modal fade" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastro de Associado</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">

                            <div class="col-sm-2">
                                <label class="control-label" for="idEditarEntrega">ID:</label>
                                <input type="text" class="form-control" id="idEditarEntrega">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-12"> 
                                <label class="control-label" for="tituloEditarEntrega">Titulo:</label>
                                <input type="text" class="form-control" id="tituloEditarEntrega">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-12">
                                <label class="control-label" for="descricaoEditarEntrega">Descrição:</label>
                                <div id="descricaoEditarEntrega" class="form-control" style="border-radius: 3px; height:200px; font-size: 10px; padding-left: 10px; padding-top: 10px"></div>
                            </div>
                        </div>
                    </form>

                    <div id="erroAlteracaoDadosVazios" class="alert alert-danger fade in">
                        <a href="#" class="close alert-close">&times;</a>
                        <strong>Erro!</strong> Valores não podem ser vazios.
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarAlteracoes()">Salvar Alterações</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</html>

<script>
    function abreModalCadastro() {
        alert("hey");
        $("#modalCadastro").modal('show');
    }
</script>



