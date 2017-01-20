<?php
// Sistema para verificar se o usuário já está logado ou não
session_start();
if (!$_SESSION['logado']) {
    header("Location: login.php");
} else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo"<script language='javascript' type='text/javascript'>alert('Sua sessão expirou! É necessário entrar novamente.');window.location.href='login.php';</script>";
    }

    $nomeUsuarioLogado = $_SESSION['nomeLogado'];
    $imagemUsuarioLogado = $_SESSION['imagemLogado'];
}
$jsPagina = 'listarCarros';
include_once './templateHeader.php';
include '../funcoes/funcoesGerais.php';
$corSelecionada = getBgColor();
?>
<body class="hold-transition <?php echo $corSelecionada ?> sidebar-mini">
    <div class="wrapper">
        <header class="main-header">

            <!-- Logo -->
            <a href="../admin/index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><i class="fa fa-automobile" style="padding-top: 15px"></i></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>WHdev</b> SGC</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    </ul>
                </div>

            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
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

                    <li>
                        <a href="../admin/index.php">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-key"></i>
                            <span>Entregas</span>
                            <i class="ion-ios-arrow-down pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../admin/novaEntrega.php"><i class="fa fa-plus"></i> Nova entrega</a></li>
                            <li><a href="../admin/listarEntregas.php"><i class="fa fa-navicon"></i> Listar</a></li>
                        </ul>
                    </li>

                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-car"></i>
                            <span>Carros</span>
                            <i class="ion-ios-arrow-down pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../admin/novoCarro.php"><i class="fa fa-plus"></i> Novo carro</a></li>
                            <li class="active"><a href="../admin/listarCarros.php"><i class="fa fa-navicon"></i> Listar</a></li>
                            <li><a href="../admin/definirDestaques.php"><i class="fa fa-star"></i> Carros em Destaque</a></li>
                            <li><a href="../admin/marcarVendido.php"><i class="fa fa-check"></i> Marcar como Vendido</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="../admin/listarModelos.php">
                            <i class="fa fa-bookmark-o"></i>
                            <span>Modelos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/listarMarcas.php">
                            <i class="fa fa-shield"></i>
                            <span>Marcas</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/listarOpcionais.php">
                            <i class="fa fa-check-circle-o"></i>
                            <span>Opcionais</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/listarCategorias.php">
                            <i class="fa fa-motorcycle"></i>
                            <span>Categorias</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/listarTipos.php">
                            <i class="fa fa-flag"></i>
                            <span>Tipos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/listarPerfis.php">
                            <i class="fa fa-odnoklassniki"></i>
                            <span>Perfis</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Usuários</span>
                            <i class="ion-ios-arrow-down pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../admin/novoUsuario.php"><i class="fa fa-plus"></i> Novo usuário</a></li>
                            <li><a href="../admin/listarUsuarios.php"><i class="fa fa-navicon"></i> Listar</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="../admin/listarInteresses.php">
                            <i class="fa fa-eye"></i> <span>Interesses</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/listarContatos.php">
                            <i class="fa fa-phone"></i> <span>Contatos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/destaques.php">
                            <i class="fa fa-asterisk"></i> <span>Destaques</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/configuracoes.php">
                            <i class="fa fa-gear"></i> <span>Configurações</span>
                        </a>
                    </li>

                    <li>
                        <a href="../admin/suporte.php">
                            <i class="fa fa-support"></i> <span>Suporte</span>
                        </a>
                    </li>

                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i>
                            <span>Sair</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>&nbsp;</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span>&nbsp;</span>
                        </a>
                    </li>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <h1>
                    Carros
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../admin/index.php"><i class="fa fa-car"></i>WHdev SGC</a></li>
                    <li class="active">Listar Carros</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">

                            <div class="box-body">
                                <h3>Listagem de Carros</h3><br/>

                                <table id="tableCarros" class="table table-bordered table-striped display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th width='10%'>ID</th>
                                            <th width='25%'>Marca</th>
                                            <th width='25%'>Modelo</th>
                                            <th width='10%'>Ano Fab.</th>
                                            <th width='10%'>Ano Mod.</th>
                                            <th width='10%'>Preço</th>
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

    <!--Modal Edição-->
    <div id="modalEditarCarro" class="modal fade" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Carro</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">

                            <div class="col-sm-2">
                                <label class="control-label" for="idEditarCarro">ID:</label>
                                <input type="text" class="form-control" id="idEditarCarro">
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-sm-4"> 
                                <label class="control-label" for="quilometragemEditarCarro">Quilometragem</label>
                                <input type="text" class="form-control" id="quilometragemEditarCarro">
                            </div>

                            <div class="col-sm-4"> 
                                <label class="control-label" for="tipoCombustivelEditarCarro">Tipo de Combustível</label>
                                <select id="tipoCombustivelEditarCarro" class="form-control">
                                    <option value="">Selecione um item</option>
                                    <option id="flex" value="Flex">Flex</option>
                                    <option id="gasolina" value="Gasolina">Gasolina</option>
                                    <option id="alcool" value="Álcool">Álcool</option>
                                    <option id="diesel" value="Diesel">Diesel</option>
                                    <option id="etanol" value="Etanol">Etanol</option>
                                    <option id="gasNatural" value="Gás Natural">Gás Natural</option>
                                </select>
                            </div>

                            <div class="col-sm-4"> 
                                <label class="control-label" for="corEditarCarro">Cor</label>
                                <input type="text" class="form-control" id="corEditarCarro">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-4"> 
                                <label class="control-label" for="anoFabricacaoEditarCarro">Ano de Fabricação</label>
                                <input type="text" class="form-control" id="anoFabricacaoEditarCarro">
                            </div>

                            <div class="col-sm-4"> 
                                <label class="control-label" for="anoModeloEditarCarro">Ano do Modelo</label>
                                <input type="text" class="form-control" id="anoModeloEditarCarro">
                            </div>

                            <div class="col-sm-4"> 
                                <label class="control-label" for="precoEditarCarro">Preço</label>
                                <input type="text" class="form-control" id="precoEditarCarro">
                            </div>

                            
                        </div>
                        <div class="row">

                            <div class="col-md-4"> 
                                <label class="control-label" for="modeloEditarCarro">Modelo</label>
                                <select id="modeloEditarCarro" class="form-control">
                                </select>
                            </div>


                            <div class="col-md-4"> 
                                <label class="control-label" for="tipoEditarCarro">Tipo</label>
                                <select  id="tipoEditarCarro" class="form-control">
                                </select>
                            </div>

                            <div class="col-sm-4"> 
                                <label class="control-label" for="versaoEditarCarro">Versão</label>
                                <input type="text" class="form-control" id="versaoEditarCarro">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-12">
                                <label class="control-label" for="observacoesEditarCarro">Observação</label>
                                <div id="observacoesEditarCarro" class="form-control" style="border-radius: 3px; height:200px; font-size: 10px; padding-left: 10px; padding-top: 10px"></div>
                            </div>
                        </div>

                        <br/>

                        <label>Opcionais</label>
                        <div class="panel-group">
                            <div class="panel panel-primary class">
                                <div class="panel-body">
                                    <div id='opcionaisCarros' style="text-align: center">

                                    </div>
                                </div>    
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
</body>
</html>






