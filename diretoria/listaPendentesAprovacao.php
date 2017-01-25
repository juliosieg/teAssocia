<html>
    <head>
        <title>teAssocia - Área da Diretoria</title>

        <meta charset = "UTF-8">

        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">

        <style>

            .desabilitada{
                pointer-events: none;
                opacity:0.4;
            }

        </style>

        <!--Font Awesome -->
        <link rel = "stylesheet" href = "../adminLte/plugins/font-awesome-4.6.3/css/font-awesome.css">
        <!--Ionicons -->
        <link rel = "stylesheet" href = "../adminLte/plugins/ionicons-2.0.1/css/ionicons.css">
        <!--Theme style -->
        <link rel = "stylesheet" href = "../adminLte/dist/css/AdminLTE.css">
        <!--Skin -->
        <link rel = "stylesheet" href = "../adminLte/dist/css/skins/_all-skins.css">
        <!--DataTables -->
        <link rel = "stylesheet" href = "../adminLte/plugins/datatables/dataTables.bootstrap.css">
        <!--Buttons DataTables -->
        <link rel = "stylesheet" href = "../adminLte/plugins/datatables/buttons.dataTables.min.css">
        <!--DataTables Responsive-->
        <link rel = "stylesheet" href = "../adminLte/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <!--Bootstrap -->
        <link rel="stylesheet" href="../adminLte/bootstrap/css/bootstrap.css">


        <!--jQuery -->
        <script src = "../adminLte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap -->
        <script src="../adminLte/bootstrap/js/bootstrap.js"></script>
        <!-- AdminLTE App -->
        <script src="../adminLte/dist/js/app.min.js"></script>


        <!-- DataTables -->
        <script src="../adminLte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../adminLte/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="../adminLte/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../adminLte/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../adminLte/plugins/datatables/pdfMake.min.js"></script>
        <script src="../adminLte/plugins/datatables/vfs_fonts.js"></script>
        <script src="../adminLte/plugins/datatables/jszip.min.js"></script>
        <script src="../adminLte/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="../adminLte/plugins/datatables/buttons.colVis.min.js"></script>

        <script src="../diretoria/js/listaPendentesAprovacao.js"></script>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">

                <!-- Logo -->
                <a href="../diretoria/index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><i class="fa fa-bank" style="padding-top: 15px"></i></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>te</b> Associa</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>

                    </a>

                    <p align="center" style="color: white; font-weight: bold; padding-top: 1%; font-size: 18px ">
                        Associação dos Universitários e Estudantes de Ibirubá
                    </p>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU ADMINISTRATIVO</li>

                        <li>
                            <a href="../diretoria/index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>


                        <li data-toggle="tooltip" data-placement="right" title="Função desabilitada. Em breve será liberada">
                            <a href="../admin/listarTipos.php" class="desabilitada">
                                <i class="fa fa-info"></i>
                                <span>Dados da Associação</span>
                            </a>
                        </li>


                        <li class="treeview active">
                            <a>
                                <i class="fa fa-users"></i>
                                <span>Associados</span>
                                <i class="ion-ios-arrow-down pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="listarAssociados.php"><i class="fa fa-navicon"></i> Listar</a></li>
                                <li class="active"><a href="listaPendentesAprovacao.php"><i class="fa fa-ban"></i> Pendentes de Aprovação</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a>
                                <i class="fa fa-table"></i>
                                <span>Cadastros</span>
                                <i class="ion-ios-arrow-down pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li data-toggle="tooltip" data-placement="right" title="Função desabilitada. Em breve será liberada">
                                    <a href="../admin/listarTipos.php" class="desabilitada"><i class="fa fa-flag"></i> Paradas</a>
                                </li>
                                <li data-toggle="tooltip" data-placement="right" title="Função desabilitada. Em breve será liberada">
                                    <a href="../admin/listarTipos.php" class="desabilitada"><i class="fa fa-graduation-cap"></i> Entidades</a>
                                </li>
                                <li data-toggle="tooltip" data-placement="right" title="Função desabilitada. Em breve será liberada">
                                    <a href="../admin/listarTipos.php" class="desabilitada"><i class="fa fa-book"></i> Semestres</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </section>

            </aside>

            <div class="content-wrapper">

                <section class="content-header">

                    <h1>
                        Pendentes de Aprovação
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../admin/index.php"><i class="fa fa-ban"></i>Te Associa</a></li>
                        <li class="active">Pendentes de Aprovação</li>
                    </ol>
                </section>



                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="box">

                                <div class="box-body">

                                    <table id="tableAssociadosPendentes" class="table table-bordered table-striped display responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th width='10%'>ID</th>
                                                <th width='30%'>Nome</th>
                                                <th width='20%'>Celular</th>
                                                <th width='30%'>Entidade</th>
                                                <th width='10%'>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>

    <!--Modal Edição-->
    <div id="modalVerFicha" class="modal fade modal-wide" tabindex="-1" role="dialog" >
        <div class="modal-dialog custom-class">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ficha Cadastral</h4>
                </div>
                <div class="modal-body">
                    <form id="formAluno" enctype="multipart/form-data" onsubmit="return validaCadastro();">
                        <label>CPF:</label>
                        <span id="cpfAluno"></span>

                        <hr>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <label>Nome:</label>
                                <span id="nomeAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Data de Nascimento:</label>
                                <span id="dtNascimento"></span>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>RG:</label>
                                <span id="rgAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Título de Eleitor:</label>
                                <span id="tituloEleitorAluno"></span>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Zona Eleitoral:</label>
                                <span id="zonaEleitoralAluno"></span>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Seção Eleitoral:</label>
                                <span id="secaoEleitoralAluno"></span>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <label>Endereço:</label>
                                <span id="enderecoAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label>UF:</label>
                                <span id="ufAluno"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label>Cidade:</label>
                                <span id="cidadeAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label>Bairro:</label>
                                <span id="bairroAluno"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label>CEP:</label>
                                <span id="cepAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <label>Telefone Residencial:</label>
                            <span id="telefoneAluno"></span>

                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Telefone Celular:</label>
                                <span id="celularAluno"></span>    
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Email:</label>
                                <span id="emailAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Curso:</label>
                                <span id="cursoAluno"></span>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Matrícula:</label>
                                <span id="matriculaAluno"></span>
                            </div>




                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                <label>Tipo Sanguíneo:</label>
                                <span id="tipoSanguineoAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label>Semestre:</label>
                                <span id="semestreAluno"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label>Parada:</label>
                                <span id="paradaAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                <label>Entidade:</label>
                                <span id="entidadeAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label>Melhor dia para pagamento:</label>
                                <span id="melhorDiaPagamento"></span>
                            </div>
                        </div>

                        <hr>
                        
                        <h4>Anexos</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Comprovante de Matrícula:</label>
                                <span id="comprovanteMatricula"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Foto:</label>
                                <span id="fotoAluno"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Título de Eleitor:</label>
                                <span id="tituloEleitorFoto"></span>
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
                                    <th>Fevereiro</th>
                                    <td><span id="fevSeg"></span></td>
                                    <td><span id="fevTer"></span></td>
                                    <td><span id="fevQua"></span></td>
                                    <td><span id="fevQui"></span></td>
                                    <td><span id="fevSex"></span></td>
                                    <td><span id="fevSab"></span></td>
                                </tr>
                                <tr>
                                    <th>Março</th>
                                    <td><span id="marSeg"></span></td>
                                    <td><span id="marTer"></span></td>
                                    <td><span id="marQua"></span></td>
                                    <td><span id="marQui"></span></td>
                                    <td><span id="marSex"></span></td>
                                    <td><span id="marSab"></span></td>
                                </tr>
                                <tr>
                                    <th>Abril</th>
                                    <td><span id="abrSeg"></span></td>
                                    <td><span id="abrTer"></span></td>
                                    <td><span id="abrQua"></span></td>
                                    <td><span id="abrQui"></span></td>
                                    <td><span id="abrSex"></span></td>
                                    <td><span id="abrSab"></span></td>
                                </tr>
                                <tr>
                                    <th>Maio</th>
                                    <td><span id="maiSeg"></span></td>
                                    <td><span id="maiTer"></span></td>
                                    <td><span id="maiQua"></span></td>
                                    <td><span id="maiQui"></span></td>
                                    <td><span id="maiSex"></span></td>
                                    <td><span id="maiSab"></span></td>
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
                                <label>Observações</label>
                                <span id="observacoesAluno"></span>

                            </div>
                        </div>

                        <div class="clearfix"></div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarAlteracoes()">Salvar Alterações</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</html>