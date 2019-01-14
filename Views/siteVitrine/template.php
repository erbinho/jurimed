<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <meta id="viewport" name="viewport" content="width=device-width, user-scalable=1, shrink-to-fit=no"/>
       <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/favicon.ico" type="image/x-icon" />
       <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css"/>
       <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteGuia/style.css"/>
       <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteVitrine/styleMobile.css"/>
       <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
       <title>SIS - Sistema Integrado Sites</title>
   </head>
   <body>
        <div class="container-fluid" style="border-bottom: 1px solid #ccc;">
            <div class="container">
                <div class="row" style="padding: 5px;">

                    <div class="col-lg-4 d-flex justify-content-center align-items-center">

                        <ul class="nav justify-content-center">
                            <li class="nav-item d-flex justify-content-center">
                                <a class="nav-link" style="color: #CC8C06;" href="<?php echo BASE_URL; ?>">HOME</a>
                            </li>
                            <div style="color: #CC8C06; padding-top:6px;">/</div>
                            <li class="nav-item d-flex justify-content-center">
                                <a class="nav-link" style="color: #CC8C06;" href="<?php echo BASE_URL; ?>/GuiaEmpresa">GUIA EMPRESA</a>
                            </li>
                            <div style="color: #CC8C06; padding-top:6px;">/</div>
                            <li class="nav-item d-flex justify-content-center">
                                <a class="nav-link" style="color: #CC8C06;" href="<?php echo BASE_URL; ?>/vitrine">VITRINE</a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-lg-4">

                        <a href="<?php echo BASE_URL; ?>/vitrine" class="nav-link d-flex justify-content-center align-items-center">
                            <img src="<?php echo BASE_URL; ?>/assets/images/logoSIS.png" alt="Logo SIS" width="125px">
                            <div style="font-family: 'Fredoka One', cursive; font-size: 56px; margin-left: 10px; color: #F7C04F;"><strong style="color: #CD8D07;">V</strong>itrine</div>
                        </a>

                    </div>

                    <div class="col-lg-4 d-flex justify-content-center align-items-center">

                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" style="color: #CC8C06;" href="#">CONTATO</a>
                            </li>
                            <div style="color: #CC8C06; padding-top:6px;">/</div>
                            <li class="nav-item d-flex align-items-center">
                                <?php if(!empty($_SESSION['hashLogin'])){?>
                                    <div style="padding-top: 8px; padding-right: 5px; margin-left: 15px; max-width: 15ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        <label style="color: #CD8D07;"><strong style="text-transform: uppercase;"><?php echo $_SESSION['infoUserLogon']['nome'];?></strong></label>
                                    </div>
                                <a href="<?php echo BASE_URL;?>/Login/logout" class="badge badge-pill badge-warning">SAIR</a>
                                <?php }else{ ?>
                                <a class="nav-link" style="color: #CC8C06;" href="<?php echo BASE_URL; ?>/Login">LOGIN</a>
                                <?php } ?>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
        <div class="container d-flex align-items-center justify-content-center">
            <div class="input-group input-group-lg" style="margin: 10px; max-width: 650px;" >
                <input type="text" name="busca" class="form-control" placeholder="Busque algum Produto..." style="border-radius:80px 0px 0px 80px;  ">
                <div class="input-group-append">
                    <button id="buscaCat" type="button" class="btn btn-warning dropdown-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Todas as Categoria</button>
                    <div class="dropdown-menu scrollCategory">
                        <a class="dropdown-item itemCat" href="#" data-id="26" data-name="Açougue">Açougue</a>
                    </div>
                    <input type="submit" class="btn btn-outline-warning btn_seach" value="" style="border-radius:0px 80px 80px 0px;">
                </div>
            </div>
        </div>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <footer class="container-fluid">
            <div class="container footer-guia">
                <label class="text-secondary text-center"><strong>SIS / Vitrine</strong> | <a href="#">Contato</a> | Envie um email para suporte.sis@hotmail.com | </label>
                <label class="text-secondary text-center">Não precisa mais Buscar em outros sites! Anuncie no SIS Vitrine seus Produtos.</label>
                <label class="text-secondary text-center">SIS - Sistema Integrado de Empresas - <?php echo date('Y');?></label>
                <img src="<?php echo BASE_URL; ?>/assets/images/logoSIS.png" alt="Logo SIS" width="125px">
                <label class="text-secondary text-center">&copyTodos os Direitos reservados</label>
                <br>
            </div>
        </footer>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
        <!-- SCRIPTS DO SITEHOME -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/siteVitrine/scrypt.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/siteVitrine/scryptFunctions.js"></script>
    </body>
</html>
