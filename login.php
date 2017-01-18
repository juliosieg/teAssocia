<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <script src="js/jquery3.1.1.js"></script>
        <script src="js/jquery_mask.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    



        <link rel="stylesheet" href="css/login.css">
        <script src="js/login.js"></script>


        <title>Login - teAssocia</title>

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
                                        <button onclick="abreModalCadastro()" type="button" class="btn btn-success btn-lg">Cadastrar</button>
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
                <div class="modal-body">
                    <div class="span3">
                        <form>
                            <label>Consulta de CPF</label>
                            <div class="row">
                                
                                <div class="col-lg-10 col-md-10 col-sm-10" style="padding-bottom: 10px;">

                                    <input type="text" id="cpfAluno" class="form-control input-md" name="cpfAluno" placeholder="Entre com o CPF" class="span3">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <input type="button" class="btn btn-success" value="Consultar" onclick="consultaCpf()"/>
                                </div>
                            </div>

                            <hr>
                            <div class="dadosConsulta">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>RG</label>
                                        <input id="rgAluno" type="text" class="form-control input-md" name="rg" class="span3">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Nome</label>
                                        <input id="nomeAluno" type="text" class="form-control input-md" name="nome" class="span3" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Endereço</label>
                                        <input id="enderecoAluno" type="text" class="form-control input-md" name="endereco" placeholder="Exemplo: Rua Machado de Assis, 15 - Apto 404 Bloco B" class="span3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>UF</label>
                                        <select class="input-md form-control" id="ufAluno" onchange="carregaCidades()">
                                            <option value="Selecione uma UF" >Selecione uma UF</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Cidade</label>
                                        <select class="input-md form-control" id="cidadeAluno">
                                            <option value="Selecione uma UF" >Selecione uma UF</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control input-md" name="bairro" id="bairroAluno" class="span3" >
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>CEP</label>
                                        <input type="text" class="form-control input-md" name="cep" id="cepAluno" class="span3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Telefone Residencial</label>
                                        <input type="text" class="form-control input-md" name="telefone" id="telefoneAluno" class="span3">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Telefone Celular</label>
                                        <input type="text" class="form-control input-md sp_celphones" name="celular" id="celularAluno" class="span3">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>E-mail</label>
                                        <input type="email" id="emailAluno" class="form-control input-md" name="nome" class="span3">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Curso</label>
                                        <input type="text" id="cursoAluno" class="form-control input-md" name="nome" class="span3">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Semestre</label>
                                        <select class="input-md form-control" id="semestreAluno">
                                            <option value="Selecione um Item" >Selecione um Item</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Parada</label>
                                        <select class="input-md form-control" id="paradaAluno">
                                            <option value="Selecione um Item" >Selecione um Item</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Entidade</label>
                                        <select class="input-md form-control" id="entidadeAluno">
                                            <option value="Selecione um Item" >Selecione um Item</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="submit" value="Cadastrar" class="btn btn-primary pull-right">
                                <div class="clearfix"></div>

                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</html>