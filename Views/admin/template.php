
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIS | Painel de Gerenciamento</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/dataTables/datatables.min.css"  type="text/css"/>
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/jquery-ui.min.css"  type="text/css"/>
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/plugins/jquery-upload-file/css/uploadfile.css"  type="text/css"/>
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/admin/style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition <?php echo $viewData['user']->getUserDados()['skinsPainel'];?> sidebar-mini" data-skin="<?php echo $viewData['user']->getUserDados()['skinsPainel'];?>">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo BASE_URL; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIS</b> | Painel</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Possui 0 Notificações</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                        Sem notificações
                      <!--<i class="fa fa-users text-aqua"></i> 5 new members joined today-->
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">Ver Todos</a></li>
            </ul>
          </li>

          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Avisos do Sistema</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                        Sem Avisos
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">Ver Todos os Avisos</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $viewData['user']->getUserDados()['NomeUser'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo BASE_URL ?>/assets/images/fotoUser/<?php echo $viewData['user']->getUserDados()['retrato_foto'];?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $viewData['user']->getUserDados()['NomeUser'];?>
                  <small>Online</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Bate Papo</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Chamados</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Ajuda</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Editar Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo BASE_URL;?>/login/logout" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo BASE_URL ?>/assets/images/fotoUser/<?php echo $viewData['user']->getUserDados()['retrato_foto'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $viewData['user']->getUserDados()['NomeUser'];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>

        <!-- Optionally, you can add icons to the links -->
        <li class="<?php echo ($viewData['menuActive']) == 'home'?'active':'';?>">
            <a href="<?php echo BASE_URL;?>/Dashboard">
                <i class="fa fa-dashboard"></i>
                <span>Painel Inicial</span>
            </a>
        </li>        

        <?php if($viewData['user']->hasPermissions('permission_view')): ?>
            <li class="treeview <?php echo ($viewData['menuActive']) == 'permission'?'active':'';?>">
                <a href="#">
                    <i class="fa fa-expeditedssl"></i>
                    <span>Permissões</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($viewData['subMenuActive']) == 'grup_perm'?'active':'';?>">
                        <a href="<?php echo BASE_URL;?>/Permissions">
                            <i class="fa fa-object-ungroup"></i>
                            Grupos de Permissão
                        </a>
                    </li>
                    <li class="<?php echo ($viewData['subMenuActive']) == 'params_perm'?'active':'';?>">
                        <a href="<?php echo BASE_URL;?>/Permissions/parametros">
                            <i class="fa fa-object-group"></i>
                            Parametros de Permissão
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if($viewData['user']->hasPermissions('users_view')): ?>
            <li class="treeview <?php echo ($viewData['menuActive']) == 'users'?'active':'';?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Usuários</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($viewData['subMenuActive']) == 'listaUser'?'active':'';?>">
                        <a href="<?php echo BASE_URL;?>/Usuarios">
                            <i class="fa fa-list"></i>
                            Lista de Usuários
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php $this->loadViewInTemplate($viewName, $viewData);?>
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">SIS - Sistema Integrado de Sites</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Área de Atividades</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nenhum aniversariante</h4>

                <p>Hoje é dia <?php echo date('d/m/Y');?></p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
            <h4 class="control-sidebar-heading">Aparências</h4>
            <ul class="list-unstyled clearfix">
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-blue">
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span>
                            <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Azul</p>
                </li>
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-black">
                        <div class="clearfix" style="box-shadow: 0 0 2px rgba(0,0,0,0.1)">
                            <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span>
                            <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Preto</p>
                </li>
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin"class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-purple">
                        <div>
                            <span class="bg-purple-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                            <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Roxa</p>
                </li>
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-green">
                        <div>
                            <span class="bg-green-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                            <span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Verde</p>
                </li>
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-red">
                        <div>
                            <span class="bg-red-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                            <span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Vermelho</p>
                </li>
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-yellow">
                        <div>
                            <span class="bg-yellow-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                            <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span>
                            <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Amarelo</p>
                </li>
                <li style="float:left; width: 33.33333%; padding: 5px;">
                    <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-blue-light"><div>
                        <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span>
                        <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                    </div>
                    <div>
                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span>
                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
                </a>
                <p class="text-center no-margin" style="font-size: 12px">Luz Azul</p>
            </li>
            <li style="float:left; width: 33.33333%; padding: 5px;">
                <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-black-light">
                    <div class="clearfix" style="box-shadow: 0 0 2px rgba(0,0,0,0.1)">
                        <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span>
                        <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span>
                    </div>
                    <div>
                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span>
                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
                </a>
                <p class="text-center no-margin" style="font-size: 12px">Luz Negra</p>
            </li>
            <li style="float:left; width: 33.33333%; padding: 5px;">
                <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-purple-light">
                    <div>
                        <span class="bg-purple-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                        <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
                    </div>
                    <div>
                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span>
                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
                </a>
                <p class="text-center no-margin" style="font-size: 12px">Luz Roxa</p>
            </li>
            <li style="float:left; width: 33.33333%; padding: 5px;">
                <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-green-light">
                    <div>
                        <span class="bg-green-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                        <span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span>
                    </div>
                    <div>
                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span>
                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
                </a>
                <p class="text-center no-margin" style="font-size: 12px">Luz Verde</p>
            </li>
            <li style="float:left; width: 33.33333%; padding: 5px;">
                <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-red-light">
                    <div>
                        <span class="bg-red-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                        <span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span>
                    </div>
                    <div>
                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span>
                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
                </a>
                <p class="text-center no-margin" style="font-size: 12px">Luz Vermelha</p>
            </li>
            <li style="float:left; width: 33.33333%; padding: 5px;">
                <a id="skin" class="clearfix full-opacity-hover" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" href="javascript:void(0)" data-skin="skin-yellow-light">
                    <div>
                        <span class="bg-yellow-active" style="display:block; width: 20%; float: left; height: 7px;"></span>
                        <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span>
                    </div>
                    <div>
                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span>
                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                    </div>
                </a>
                <p class="text-center no-margin" style="font-size: 12px">Luz Amarela</p>
            </li>
          </ul>
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript">
    var BASE_URL = '<?php echo BASE_URL; ?>';
</script>
<!-- jQuery 3 -->
<script src="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL ?>/assets/plugins/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/js/jquery.mask.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/js/mascaras.js"></script>
<script src="<?php echo BASE_URL ?>/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/plugins/select2/select2.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/plugins/iCheck/iCheck.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/plugins/jquery-upload-file/js/jquery.uploadfile.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/plugins/jquery-form/jquery.form.js"></script>
<script src="<?php echo BASE_URL ?>/assets/js/admin/plugins.js"></script>
<script src="<?php echo BASE_URL ?>/assets/js/admin/script.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>