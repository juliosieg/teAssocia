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

        <script src="js/sweetalert.min.js"></script>
        <link rel="stylesheet" href="css/sweetalert.css">

        <link rel="stylesheet" href="css/index.css">
        <script src="js/index.js"></script>

        <link href="plugins/datepicker/css/datepicker.css" rel="stylesheet">
        <script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="plugins/datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

        <!-- File input -->
        <link rel="stylesheet" href="plugins/bootstrap-fileinput/css/fileinput.css">
        <!-- jQuery file Upload -->
        <script src="plugins/bootstrap-fileinput/js/fileinput.js"></script>
        <!--Bootstrap File Input Locale -->
        <script src="plugins/bootstrap-fileinput/js/locales/pt-BR.js"></script>

        <title>Login - teAssocia</title>

    </head>
    <body>
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <p align="center"><img src="images/logoTeAssocia.png" width="80%"/></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login em <b>Associação dos Universitários e Estudantes de Ibirubá</b></h3>
                        </div>
                        <div class="panel-body">
                            <form accept-charset="UTF-8" role="form">

                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" id="emailLogin" placeholder="E-mail" name="email" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="senhaLogin" placeholder="Senha" name="password" type="password" value="">
                                    </div>

                                    <div class="ui-group-buttons" style="padding-left: 7%">
                                        <button type="button"  onclick="efetuarLogin()" class="btn btn-info btn-lg">Login</button>

                                        <button onclick="abreModalCadastro()" type="button" class="btn btn-success btn-lg">Quero me associar!</button>
                                    </div>


                                </fieldset>

                            </form>
                            <br>
                            <p align="center">Um produto <a href="http://www.whdev.com.br"><img src="images/logo.png" width="20%"/></a></p>
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
                        <form id="formAluno" enctype="multipart/form-data" onsubmit="return validaCadastro();">
                            <label>Consulta de CPF</label>
                            <div class="row">

                                <div class="col-lg-10 col-md-10 col-sm-10" style="padding-bottom: 10px;">

                                    <input type="text" id="cpfAluno" class="form-control input-md" placeholder="Entre com o CPF" class="span3">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <input type="button" class="btn btn-success" value="Consultar" onclick="consultaCpf()"/>
                                </div>
                            </div>

                            <hr>

                            <div class="dadosConsulta">

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Nome</label><span style="color: red">*</span>
                                        <input id="nomeAluno" type="text" class="form-control input-md" class="span3" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Data de Nascimento</label><span style="color: red">*</span>
                                        <input id="dtNascimento" type="text" class="form-control input-md" class="span3">
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>RG</label><span style="color: red">*</span>
                                        <input id="rgAluno" type="text" class="form-control input-md" class="span3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Título de Eleitor</label><span style="color: red">*</span>
                                        <input id="tituloEleitorAluno" type="text" maxlength="12" minlength="12" class="form-control input-md" class="span3">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Zona Eleitoral</label><span style="color: red">*</span>
                                        <input id="zonaEleitoralAluno" type="text" class="form-control input-md" class="span3">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Seção Eleitoral</label><span style="color: red">*</span>
                                        <input id="secaoEleitoralAluno" type="text" maxlength="4" minlength="4" class="form-control input-md" class="span3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Endereço</label><span style="color: red">*</span>
                                        <input id="enderecoAluno" type="text" class="form-control input-md" placeholder="Exemplo: Rua Machado de Assis, 15 - Apto 404 Bloco B" class="span3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>UF</label><span style="color: red">*</span>
                                        <select class="input-md form-control" id="ufAluno" onchange="carregaCidades()">
                                            <option value="" >Selecione uma UF</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Cidade</label><span style="color: red">*</span>
                                        <select class="input-md form-control" id="cidadeAluno">
                                            <option value="" >Selecione uma UF</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Bairro</label><span style="color: red">*</span>
                                        <input type="text" class="form-control input-md" id="bairroAluno" class="span3" >
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>CEP</label><span style="color: red">*</span>
                                        <input type="text" class="form-control input-md" id="cepAluno" class="span3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Telefone Residencial</label>
                                        <input type="text" class="form-control input-md" id="telefoneAluno" class="span3">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Telefone Celular</label><span style="color: red">*</span>
                                        <input type="text" class="form-control input-md sp_celphones" id="celularAluno" class="span3">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>E-mail</label><span style="color: red">*</span>
                                        <input type="email" id="emailAluno" class="form-control input-md" class="span3">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Curso</label><span style="color: red">*</span>
                                        <input type="text" id="cursoAluno" class="form-control input-md" class="span3">
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Matrícula</label>
                                        <input type="text" id="matriculaAluno" class="form-control input-md" class="span3">
                                    </div>




                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                        <label>Tipo Sanguíneo</label><span style="color: red">*</span>
                                        <select id="tipoSanguineoAluno" class="form-control input-md" class="span3">
                                            <option value="">Selecione um item</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Semestre</label><span style="color: red">*</span>
                                        <select class="input-md form-control" id="semestreAluno">
                                            <option value="Selecione um Item" >Selecione um Item</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                        <label>Parada</label><span style="color: red">*</span>
                                        <select class="input-md form-control" id="paradaAluno">
                                            <option value="Selecione um Item" >Selecione um Item</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Entidade</label><span style="color: red">*</span>
                                        <select class="input-md form-control" id="entidadeAluno">
                                            <option value="Selecione um Item" >Selecione um Item</option>
                                        </select>
                                        <span style="color: red; font-size: 12px">O Ônibus passa apenas pela Avenida Brasil</span>
                                        <br/><span style="color: red; font-size: 12px">Para opção 'Outros', informe a entidade no campo de Observações</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label class="control-label">Melhor Dia para Pagamento</label><span style="color: red">*</span>
                                        <div class="btn-group col-md-12" id="melhorDiaPagamento">
                                            <button type="button" class="btn btn-primary col-lg-6 col-md-6 col-sm-6">15</button>
                                            <button type="button" class="btn btn-primary col-lg-6 col-md-6 col-sm-6">20</button>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h4>Anexos</h4>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Comprovante de Matrícula</label><span style="color: red">*</span>
                                        <input id="comprovanteMatricula" name="comprovanteMatricula" type="file" class="file">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Foto</label>
                                        <input id="fotoAluno" name="fotoAluno" type="file" class="file">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Título de Eleitor</label><span style="color: red">*</span>
                                        <input id="tituloEleitorFoto" name="tituloEleitorFoto" type="file" class="file">
                                    </div>
                                </div>



                                <hr>

                                <h4>Dias da semana utilizados:</h4>

                                <table class="table table-bordered table-print table-striped">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>SEG</th>
                                            <th>TER</th>
                                            <th>QUA</th>
                                            <th class="hidden-xs">QUI</th>
                                            <th class="hidden-xs">SEX</th>
                                            <th class="hidden-xs">SÁB</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Todos os meses</th>

                                            <td><input type="checkbox" id="tdsSeg" onchange="tratamentoTodosSegunda()" onclick="tratamentoDataTodos()"></td>
                                            <td><input type="checkbox" id="tdsTer" onclick="tratamentoTodosTerca()"></td>
                                            <td><input type="checkbox" id="tdsQua" onclick="tratamentoTodosQuarta()"></td>
                                            <td><input type="checkbox" id="tdsQui" onclick="tratamentoTodosQuinta()"></td>
                                            <td><input type="checkbox" id="tdsSex" onclick="tratamentoTodosSexta()"></td>
                                            <td><input type="checkbox" id="tdsSab" onclick="tratamentoTodosSabado()"></td>
                                        </tr>
                                        <tr>
                                            <th>Fevereiro</th>
                                            <td><input type="checkbox" id="fevSeg"></td>
                                            <td><input type="checkbox" id="fevTer"></td>
                                            <td><input type="checkbox" id="fevQua"></td>
                                            <td><input type="checkbox" id="fevQui"></td>
                                            <td><input type="checkbox" id="fevSex"></td>
                                            <td><input type="checkbox" id="fevSab"></td>
                                        </tr>
                                        <tr>
                                            <th>Março</th>
                                            <td><input type="checkbox" id="marSeg"></td>
                                            <td><input type="checkbox" id="marTer"></td>
                                            <td><input type="checkbox" id="marQua"></td>
                                            <td><input type="checkbox" id="marQui"></td>
                                            <td><input type="checkbox" id="marSex"></td>
                                            <td><input type="checkbox" id="marSab"></td>
                                        </tr>
                                        <tr>
                                            <th>Abril</th>
                                            <td><input type="checkbox" id="abrSeg"></td>
                                            <td><input type="checkbox" id="abrTer"></td>
                                            <td><input type="checkbox" id="abrQua"></td>
                                            <td><input type="checkbox" id="abrQui"></td>
                                            <td><input type="checkbox" id="abrSex"></td>
                                            <td><input type="checkbox" id="abrSab"></td>
                                        </tr>
                                        <tr>
                                            <th>Maio</th>
                                            <td><input type="checkbox" id="maiSeg"></td>
                                            <td><input type="checkbox" id="maiTer"></td>
                                            <td><input type="checkbox" id="maiQua"></td>
                                            <td><input type="checkbox" id="maiQui"></td>
                                            <td><input type="checkbox" id="maiSex"></td>
                                            <td><input type="checkbox" id="maiSab"></td>
                                        </tr>
                                        <tr>
                                            <th>Junho</th>
                                            <td><input type="checkbox" id="junSeg"></td>
                                            <td><input type="checkbox" id="junTer"></td>
                                            <td><input type="checkbox" id="junQua"></td>
                                            <td><input type="checkbox" id="junQui"></td>
                                            <td><input type="checkbox" id="junSex"></td>
                                            <td><input type="checkbox" id="junSab"></td>
                                        </tr>
                                        <tr>
                                            <th>Julho</th>
                                            <td><input type="checkbox" id="julSeg"></td>
                                            <td><input type="checkbox" id="julTer"></td>
                                            <td><input type="checkbox" id="julQua"></td>
                                            <td><input type="checkbox" id="julQui"></td>
                                            <td><input type="checkbox" id="julSex"></td>
                                            <td><input type="checkbox" id="julSab"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Senha de Acesso ao Sistema</label><span style="color: red">*</span>
                                        <input type="password" id="senhaAluno" class="form-control input-md" onkeyup="verificaSenha()" class="span3">
                                        <span id="8caracteres"><img src="images/error.png"/></span>   Senha deve possuir pelo menos 8 caracteres<br/>
                                        <span id="letras"><img src="images/error.png"/></span>   Senha deve possuir letras<br/>
                                        <span id="numeros"><img src="images/error.png"/></span>   Senha deve possuir números
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <label>Observações</label>
                                        <textarea id="observacoesAluno" class="form-control input-md" class="span3" rows="5" draggable="false" re>
                                        </textarea>

                                    </div>
                                </div>

                                <input type="submit" id="btnCadastro" value="Cadastrar" class="btn btn-primary pull-right">

                                <div class="clearfix"></div>


                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>
        $("#comprovanteMatricula").fileinput({
            maxFileCount: 1,
            language: "pt-BR",
            //uploadUrl: "/file-upload-batch/2",
            allowedFileExtensions: ["pdf"],
            showUpload: false,
            showPreview: false,
            showRemove: false
        });
    </script>

    <script>
        $("#fotoAluno").fileinput({
            maxFileCount: 1,
            language: "pt-BR",
            allowedFileExtensions: ["jpg", "png", "bmp", "gif"],
            showUpload: false,
            showPreview: false,
            showRemove: false
        });

    </script>

    <script>
        $("#tituloEleitorFoto").fileinput({
            maxFileCount: 1,
            language: "pt-BR",
            //uploadUrl: "/file-upload-batch/2",
            allowedFileExtensions: ["jpg", "png", "bmp", "gif", "pdf"],
            showUpload: false,
            showPreview: false,
            showRemove: false
        });
    </script>

</html>
