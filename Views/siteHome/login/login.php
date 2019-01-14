<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=1, shrink-to-fit=no"/>
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/normalize.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/siteHome/style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
        <title>SIS - Sistema Integrado Sites</title>
    </head>
    <body style="background-color: #F0E8F3">
        <div class="d-flex flex-row justify-content-center align-items-center"  style="height: 100vh;">
            <div class="login-form" style="background-color: #fff; padding: 10px; ">
                <br>
                <div class="areaLogo text-center">
                    <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/assets/images/logoSIS.png" width="150px" align="center" /></a>
                </div>
                <h1 class="h4 display-2 text-center" style="font-size: 30px">Entre em sua Conta</h1>
                <br>

                <!-- AREA DA MSG DE ERRO -->
                <?php if(!empty($msg)): ?>
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

                    <?php echo $msg; ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                </div>
                <?php endif; ?>
                <!-- FIM DA MSG DE ERRO -->

                <ul class="nav nav-tabs">
                    <li class="nav-item" data-toggle="tooltip" title="Logar com o Cartão SIS">
                        <a class="nav-link active" data-toggle="tab" href="#formularioCard">Via Cartão</a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" title="Logar com o E-mail">
                        <a class="nav-link link" data-toggle="tab" href="#formularioEmail">Via E-mail</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <form method="POST" class="formu-login tab-pane fade show active" action="<?php echo BASE_URL;?>/Login/signin" id="formularioCard">
                        <div class="form-group">
                            <label for="cartao">Cartão:</label>
                            <input id="cartao" type="text" name="cartao" class="form-control form-control-sm" maxlength="10" placeholder="Informe o número do cartão" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input id="senha" type="password" name="senha" class="form-control form-control-sm" maxlength="10" placeholder="Informe sua Senha" autocomplete="off"/>
                        </div>
                        <div class="form-group text-center">
                            <input class="btn btn-warning btn-block" type="submit" value="Entrar" />
                            <div style="margin-top: 10px;">
                                    <a href="<?php echo BASE_URL; ?>/Login/Forget" style="color:#EF6407; font-size: 14px;" data-toggle="tooltip" title="Clique para Resetar de Senha">Esqueci minha senha</a>
                            </div>
                        </div>
                    </form>
                    <form method="POST" class="formu-login tab-pane fade" action="<?php echo BASE_URL;?>/Login/signin" id="formularioEmail">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="email" id="email" name="email" class="form-control form-control-sm" id="inlineFormInputGroupUsername2" placeholder="Informe seu E-mail" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="senhaEmail">Senha:</label>
                            <input id="senhaEmail" type="password" name="senha" class="form-control form-control-sm" placeholder="Informe sua Senha" autocomplete="off"/>
                        </div>
                        <div class="form-group text-center">
                            <input class="btn btn-warning btn-block" type="submit" value="Entrar" />
                            <div style="margin-top: 10px;">
                                <a href="<?php echo BASE_URL; ?>/Login/Forget" class="text-success" data-toggle="tooltip" title="Clique para Resetar de Senha">Esqueci minha senha</a>
                                &nbsp; &nbsp; | &nbsp; &nbsp;
                                <a href="<?php echo BASE_URL; ?>/Login/register" class="text-success" data-toggle="tooltip" title="Cadastre-se Agora! É Grátis.">Cadastre-se agora</a>
                            </div>
                        </div>
                    </form>
                </div>
                <label style="font-size: 11px; color:#333;position:absolute; margin-top: -15px; margin-left: 105px;">&copy - Sistema Integrado de Sites - <?php echo date('Y');?></label>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/guia/scrypt.js"></script>
    </body>
</html>