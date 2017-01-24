<html>
    <head>
        <title>teAssocia - Área da Diretoria</title>

        <meta charset = "UTF-8">

        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">

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

                        <li>
                            <a href="../admin/listarTipos.php">
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
                                <li><a href="#"><i class="fa fa-navicon"></i> Listar</a></li>
                                <li class='active'><a href="listaPendentesAprovacao.php"><i class="fa fa-ban"></i> Pendentes de Aprovação</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a>
                                <i class="fa fa-table"></i>
                                <span>Cadastros</span>
                                <i class="ion-ios-arrow-down pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-flag"></i> Paradas</a></li>
                                <li><a href="#"><i class="fa fa-graduation-cap"></i> Entidades</a></li>
                                <li><a href="#"><i class="fa fa-book"></i> Semestres</a></li>
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

                </section>
            </div>
        </div>


    </body>

</html>