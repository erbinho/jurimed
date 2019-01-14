<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <meta id="viewport" name="viewport" content="width=device-width, user-scalable=1, shrink-to-fit=no"/>
       <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/favicon.ico" type="image/x-icon" />
       <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css"/>
       <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteHome/style.css"/>
       <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteHome/styleMobile.css"/>
       <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
       <title>SIS - Sistema Integrado Sites</title>
   </head>
   <body>
        <div class="container-fluid top-contato">
            <div class="container">
                <div class="row">
                    <div class="email">
                        <img src="<?php echo BASE_URL; ?>/assets/images/icoEmail.svg" alt="E-Mail" width="18">
                        <label>grupo.jurimed@hotmail.com</label>
                    </div>
                    <div class="fone">
                        <img src="<?php echo BASE_URL; ?>/assets/images/icoFone.svg" alt="Contato" width="18">
                        <label>+55 41 3535-5435</label>
                    </div>
                     <?php if(!empty($_SESSION['hashLogin'])){?>
                        <div class="area-admin col">
                            <a href="<?php echo BASE_URL;?>/Dashboard" class="badge badge-pill badge-warning">Acessar Painel</a>
                        </div>
                    <?php }else{ ?>
                    <div class="area-admin col" id="area-login">
                        <label>Login</label>
                    </div>
                    <?php } ?>
                    <div class="box-login">
                        <div style="background-color: #B97E06">
                            <div class="form-group">
                                <label style="color: #fff; font-size: 20px; margin-left:10px;">Área Interna</label>
                                <a href="#" class="fecharAreaLogin" style="margin-right:10px;">X</a>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="home nav-link active" data-toggle="tab" href="#formularioCard">Via Cartão</a>
                                </li>
                                <li class="nav-item">
                                    <a class="home nav-link" data-toggle="tab" href="#formularioEmail">Via E-mail</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <form method="POST" class="formu-login tab-pane fade show active" action="<?php echo BASE_URL;?>/Login/signin" id="formularioCard">
                                <div class="form-group">
                                    <label for="cartao">Cartão:</label>
                                    <input id="cartao" type="text" name="cartao" class="form-control form-control-sm" maxlength="10" autocomplete="off" placeholder="Informe o Numero" />
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input id="senha" type="password" name="senha" class="form-control form-control-sm" maxlength="10" autocomplete="off" placeholder="Informe sua Senha"/>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Entrar" />
                                    <a href="<?php echo BASE_URL; ?>/Login/Forget" data-toggle="tooltip" title="Disabled tooltip" style="margin-left: 15px;">Esqueci minha senha</a>
                                </div>
                            </form>
                            <form method="POST" class="formu-login tab-pane fade" action="<?php echo BASE_URL;?>/Login/signin" id="formularioEmail">
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control form-control-sm" id="inlineFormInputGroupUsername2" placeholder="Informe seu E-mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="senhaEmail">Senha:</label>
                                    <input id="senhaEmail" type="password" name="senha" class="form-control form-control-sm" autocomplete="off"placeholder="Informe sua Senha" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Entrar" />
                                    <a href="<?php echo BASE_URL; ?>/Login/Forget" style="margin-left: 15px;">Esqueci minha senha</a>
                                </div>
                                <a href="<?php echo BASE_URL; ?>/Login/register" class="link cad-link">Cadastre-se agora</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid menu-start">
            <div class="container area-menu-top d-flex flex-row">
                <nav class="navbar navbar-expand-lg navbar-light menu-top" id="menu_topo">
                    <a href="<?php echo BASE_URL;?>"><img src="<?php echo BASE_URL; ?>/assets/images/logoSIS.png" alt="Logo SIS" width="125px"></a>
                    <button class="navbar-toggler btn_abrir" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" id="btn_mobile">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse hide" style="z-index: 5555; background-color: #fff;" id="navbarMenu">
                        <div class="menu_mob_sidebar">
                            <a href="<?php echo BASE_URL;?>" class="nav-item nav-link"><?php $this->lang->getLang('HOME');?></a>
                            <a href="<?php echo BASE_URL;?>/GuiaEmpresa" class="nav-item nav-link">GUIA DE EMPRESAS</a>
                            <a href="<?php echo BASE_URL;?>/Vitrine" class="nav-item nav-link">VITRINE</a>
                            <a href="#" class="nav-item nav-link">SOFTWARE</a>
                            <a href="#" class="nav-item nav-link">CONTATO</a>
                        </div>
                    </div>
                    <div class="menu_start navbar-nav ml-auto">
                        <a href="<?php echo BASE_URL;?>" class="nav-item nav-link"><?php $this->lang->getLang('HOME');?></a>
                        <a href="<?php echo BASE_URL;?>/GuiaEmpresa" class="nav-item nav-link">GUIA DE EMPRESAS</a>
                        <a href="<?php echo BASE_URL;?>/Vitrine" class="nav-item nav-link">VITRINE</a>
                        <a href="#" class="nav-item nav-link">SOFTWARE</a>
                        <a href="#" class="nav-item nav-link">CONTATO</a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- CORPO DO SITE INICIA AQUI -->
        <div class="content">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
        <!-- CORPO DO SITE TERMINA AQUI -->

        <footer class="container-fluid site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h1 class="display-3 title-Footer">LOCALIDADES / CONTATOS</h1>
                        <div class="itens-contato">
                            <div class="column">
                                <div class="col">
                                    JAGUARIAÍVA (MATRIX):
                                </div>
                                <div class="col">
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoFone.svg" width="15px;">
                                    +55 43 3535-5042
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoWhats.svg" width="15px;">
                                    +55 43 9 9842-6564
                                </div>
                            </div>
                            <div class="column">
                                <div class="col">
                                    CURITIBA (ONLINE):
                                </div>
                                <div class="col">
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoFone.svg" width="15px;">
                                    +55 41 3048-3093<br>
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoWhats.svg" width="15px;">
                                    +55 41 9 9610-4922
                                </div>
                            </div>
                            <div class="column">
                                <div class="col">
                                    PIRAÍ DO SUL (FILIAL):
                                </div>
                                <div class="col">
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoWhats.svg" width="15px;">
                                    +55 42 9 9900-8988
                                </div>
                            </div>
                            <div class="column">
                                <div class="col">
                                    MATINHOS (ONLINE):
                                </div>
                                <div class="col">
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoWhats.svg" width="15px;">
                                    +55 41 9 9634-4260
                                </div>
                            </div>
                            <div class="column">
                                <div class="col">
                                    ARAPOTI (FILIAL):
                                </div>
                                <div class="col">
                                    <img src="<?php echo BASE_URL;?>/assets/images/icoWhats.svg" width="15px;">
                                    +55 43 9 9820-5702
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <h1 class="display-3 title-Footer text-center">INSTITUCIONAL</h1>
                        <div class="col ">
                            <li><a class="link" style="color: #fff" href="<?php echo BASE_URL;?>/login">AREA DE LOGIN</a></li>
                        </div>
                        <ul class="col" style="margin-left: 20px;">
                            <li><a class="link" style="color: #fff" href="<?php echo BASE_URL;?>/GuiaEmpresa">GUIA DE EMPRESAS</a><br></li>
                            <li><a class="link" style="color: #fff" href="<?php echo BASE_URL;?>/Vitrine">VITRINE</a><br></li>
                            <li><a class="link" style="color: #fff" href="#">SOFTWARE</a><br></li>
                            <li><a class="link" style="color: #fff" href="#">CONTATO</a><br></li>
                        </ul>
                    </div>
                    <div class="col-sm">
                        <h1 class="display-3 title-Footer text-center">NOSSAS POLITICAS</h1>
                        <ul class="list-group list-group-flush text-center">
                          <li class="list-group-item" style="background-color: #692B01"><a data-toggle="tooltip" title="Clique e veja nossa Politica de Privacidade" style="color: #fff" href="#">Política de Cookies</a></li>
                          <li class="list-group-item" style="background-color: #692B01"><a style="color: #fff" href="#">Declaração de Privacidade</a></li>
                          <li class="list-group-item" style="background-color: #692B01"><a style="color: #fff" href="#">Termos de Uso</a></li>
                          <li class="list-group-item" style="background-color: #692B01"><a style="color: #fff" href="#">Direitos Autorais</a></li>
                          <li class="list-group-item" style="background-color: #692B01"><a style="color: #fff" href="#">Mapa do Site</a></li>
                       </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid text-institucional">
                <div class="container refence-footer">
                    <p>SIS / Sistema Integrado de Site - Desenvolvimento Sistemas Web</p>
                    <p>Rua Expedicionário, 655, Jaguariaíva - PR, 84200-000 - &copy <?php echo date('Y');?>. Todos os direitos reservados.</p>
                    <p>Todo o conteúdo deste site é de uso exclusivo do GRUPO SIS.</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
        <!-- SCRIPTS DO SITEHOME -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/siteHome/scrypt.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/siteHome/scryptFunctions.js"></script>
    </body>
</html>
