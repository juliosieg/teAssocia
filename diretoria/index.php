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
        <link rel="stylesheet" href="../adminLte/bootstrap/css/bootstrap.min.css">


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

        <script src="../diretoria/js/index.js"></script>

        <!-- FLOT CHARTS -->
        <script src="../adminLte/plugins/flot/jquery.flot.min.js"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="../adminLte/plugins/flot/jquery.flot.resize.min.js"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="../adminLte/plugins/flot/jquery.flot.pie.min.js"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="../adminLte/plugins/flot/jquery.flot.categories.min.js"></script>

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

                        <li class="active">
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


                        <li class="treeview">
                            <a>
                                <i class="fa fa-users"></i>
                                <span>Associados</span>
                                <i class="ion-ios-arrow-down pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="listarAssociados.php"><i class="fa fa-navicon"></i> Listar</a></li>
                                <li><a href="listaPendentesAprovacao.php"><i class="fa fa-ban"></i> Pendentes de Aprovação</a></li>
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
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../admin/index.php"><i class="fa fa-bank"></i>Te Associa</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-users" style="padding-top: 20%"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total de Associados</span>
                                    <span class="info-box-number" id="totalAssociados"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-ban" style="padding-top: 20%"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total de Associados Pendentes de Aprovação</span>
                                    <span class="info-box-number" id="totalAssociadosPendentes"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ">

                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <i class="fa fa-bar-chart-o"></i>

                                    <h3 class="box-title">Cadastrados x Pendentes de Aprovação</h3>

                                </div>
                                <div class="box-body">
                                    <div id="donut-chart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <i class="fa fa-bar-chart-o"></i>

                                    <h3 class="box-title">Cadastrados por Entidade</h3>

                                </div>
                                <div class="box-body">
                                    <div id="cadastrados-entidade" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>


    </body>

</html>