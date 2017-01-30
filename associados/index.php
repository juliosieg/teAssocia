<?php
// Sistema para verificar se o usuário já está logado ou não e testar perfil
session_start();
if (!$_SESSION['logado']) {
    header("Location: ../index.php");
} else if ($_SESSION['perfil'] != 1) {
    session_destroy();
    echo"<script language='javascript' type='text/javascript'>alert('Perfil sem permissão para acessar essa página.');window.location.href='../index.php';</script>";
} else {
    
    $now = time(); // Checking the time now when home page starts.
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo"<script language='javascript' type='text/javascript'>alert('Sua sessão expirou! É necessário entrar novamente.');window.location.href='../index.php';</script>";
    }

    $imagemUsuarioLogado = $_SESSION['imagemLogado'];
    $nomeUsuarioLogado = $_SESSION['nomeLogado'];
}
?>

<html>
    <head>
        <title>teAssocia - Área do Associado</title>

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

        <!--Bootstrap -->
        <link rel="stylesheet" href="../adminLte/bootstrap/css/bootstrap.min.css">

        <script src="js/sweetalert.min.js"></script>
        <link rel="stylesheet" href="css/sweetalert.css">


        <!--jQuery -->
        <script src = "../adminLte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap -->
        <script src="../adminLte/bootstrap/js/bootstrap.js"></script>
        <!-- AdminLTE App -->
        <script src="../adminLte/dist/js/app.min.js"></script>

        <script src="js/index.js"></script>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">

                <!-- Logo -->
                <a href="../associados/index.php" class="logo">
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

                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $imagemUsuarioLogado ?>" class="img-circle" alt="Imagem de Usuário">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $nomeUsuarioLogado ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU ADMINISTRATIVO</li>

                        <li class="active">
                            <a href="../associados/index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="../funcoes/logout.php">
                                <i class="fa fa-sign-out"></i>
                                <span>Sair</span>
                            </a>
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
                        <li><a href="../associados/index.php"><i class="fa fa-bank"></i>Te Associa</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="col-md-12">
                        <div class="box box-solid">

                            <div class="box-body with-border">
                                <h4> Prezado(a) Associado(a), </h4>
                                <h7>Essa ferramenta de controle de associações está em desenvolvimento. <br/>
                                    Dessa forma, queremos saber o que você gostaria de ver na sua área de associado. 
                                    Todas as sugestões que forem enviadas através do formulário abaixo, serão 
                                    avaliadas e desenvolvidas no decorrer do semestre, e já estarão disponíveis também 
                                    no semestre 2017/2 em fase de testes.
                                    Por isso, gostaríamos da sua ajuda. 
                                    <br/>Faça sua sugestão, e deixe o sistema com a sua cara. 

                                </h7>

                                <br/>
                                <br/>
                                <span style="font-weight: bold">Sugestões</span>
                                <form>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea id="sugestaoAluno" class="form-control" rows="8"></textarea>
                                        </div>   
                                    </div>
                                    <br/>
                                    <input type="button" class="btn-lg btn btn-success left" value="Enviar" onclick="enviarSugestao()"/>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>

                </section>
            </div>
        </div>


    </body>

</html>