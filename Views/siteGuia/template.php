<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Guia de Empresas - SIS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/favicon.ico" type="image/x-icon" />
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/owl.carousel.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteGuia/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteGuia/styleMobile.css" type="text/css" />
    </head>
    <body>

        <div class="container-fluid top-bar" style="background-color: #F0F0F0;">
            <div class="container topGuia">
                <div class="row d-flex">
                    <div class="col-sm">
                        <a href="<?php echo BASE_URL; ?>">Home</a>
                    </div>
                    <div class="col-sm-auto">
                        <?php if(!empty($_SESSION['hashLogin'])){?>
                            <label class="text-secondary welcome">Bem Vindo: <strong><?php echo $viewData['user']->getUserDados()['NomeUser'];?></strong></label>
                            <a href="<?php echo BASE_URL;?>/Login/logout" class="btn btn-warning">SAIR</a>
                        <?php }else{ ?>
                            <a href="<?php echo BASE_URL;?>/Login">Login</a>
                        <?php } ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="#">Contato</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-sm-3 d-flex flex-column align-items-center">
                    <a href="<?php echo BASE_URL;?>/GuiaEmpresa">
                        <img src="<?php echo BASE_URL; ?>/assets/images/logoSIS.png" alt="Logo SIS" width="125px">
                    </a>
                    <label style="color:#BB7900; font-weight: bold; text-align: center;">Guia de Empresas</label>
                </div>
                <div class="col-sm-9">
                    <form method="GET" action="<?php echo BASE_URL;?>/GuiaEmpresa/lista/">
                        <div class="input-group input-group-lg divInputBusc"  style="margin-bottom: 15px;">
                            <input type="text" name="busca" class="form-control inputWidth" aria-label="Area de Busca de Categorias" placeholder="Busque alguma Empresa que Procure...">
                            <div class="input-group-append">
                                <button id="buscaCat" type="button" class="btn btn-warning dropdown-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="catSelect">Selecione uma Categoria</button>
                                <input type="hidden" id="inputCategoria" name="categoria" value="">
                                <div class="dropdown-menu scrollCategory">
                                    <?php
                                    foreach ($viewData['listCategory'] as $value){
                                        echo '<a class="dropdown-item itemCat" href="#" data-id="'.$value['idCat'].'" data-name="'.$value['nomeCat'].'">'.$value['nomeCat'].'</a>';
                                    }
                                    ?>
                                </div>
                                <input type="submit" class="btn btn-outline-warning btn_seach" value="" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid areaCategory" style="background-color: #f0f0f0;">
            <div class="owl-carousel">
                <?php
                foreach ($viewData['listCategory'] as $value){
                    echo '<a class="text-secondary" data-toggle="tooltip" href="'.BASE_URL.'/GuiaEmpresa/lista/'.$value['idCat'].'" title="'.$value['nomeCat'].'">';
                        echo '<div class="itemCateg"> <div class="icoCat">';
                        if(!empty($value['icoCat'])){
                            echo '<img src="'.BASE_URL.'/assets/images/ImgCategory/'.$value['icoCat'].'" width="15">';
                        }else{
                            echo '<img src="'.BASE_URL.'/assets/images/ImgCategory/icoDefault.svg" width="15">';
                        }
                    echo '</div><label class="textCat">'.$value['nomeCat'].'</label></div></a>';
                }
                ?>
            </div>
        </div>
        <div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
        <footer class="container-fluid">
            <div class="container footer-guia">
                <label class="text-secondary text-center"><strong>SIS / Guia de Empresas</strong> | <a href="#">Contato</a> | Envie um email para suporte.sis@hotmail.com | </label>
                <label class="text-secondary text-center">Não precisa mais? Anuncie GRÁTIS no SIS Guia de Empresas</label>
                <label class="text-secondary text-center">SIS - Sistema Integrado de Empresas - <?php echo date('Y');?></label>
                <img src="<?php echo BASE_URL; ?>/assets/images/logoSIS.png" alt="Logo SIS" width="125px">
                <label class="text-secondary text-center">&copyTodos os Direitos reservados</label>
                <br>
            </div>
        </footer>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
        <script type="text/javascript">var SESSION = '<?php echo $_SESSION['hashLogin']; ?>';</script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/mousewheel.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/siteGuia/script.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgr57MCWUMgBxLF6AZ_Bw5a_5RQjRNg_0&callback=initMap" async defer></script>
    </body>
</html>