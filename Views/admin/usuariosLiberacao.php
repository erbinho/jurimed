<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small>Configuração de Acessos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li><a href="<?php echo BASE_URL;?>/Usuarios">Lista de Usuários</a></li>
        <li class="active">Acessos</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <form method="POST" action="<?php echo BASE_URL;?>/Usuarios/accessUser_Action">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Dados de Acesso do Usuário</h3>
                <div class="box-tools">
                    <input type="submit" class="btn btn-success" value="Liberar" />
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <div style="display: flex; align-content: center; justify-content: center;">
                            <?php if (!empty($dadosUser['retrato_foto'])){ ?>
                                <img class="img-circle" src="<?php echo BASE_URL ?>/assets/images/fotoUser/<?php echo $dadosUser['retrato_foto'];?>" alt="User Avatar" width="145" height="160" style="border: 5px solid #FE761B;">
                            <?php }else{ ?>
                                <img class="img-circle" src="<?php echo BASE_URL ?>/assets/images/fotoUser/default.jpg" alt="User Avatar" width="145" height="160" style="border: 5px solid #FE761B;">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2><?php echo $dadosUser['nome'];?></h2>
                        <h4>Perfil Liberado:</h4>
                        <input type="hidden" name="id_usuario" value="<?php echo $dadosUser['id'];?>">
                        <select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="group_permission">
                            <?php foreach ($listGrop as $itens):?>
                               <option id="item-<?php echo $itens['id'];?>" <?php echo ($dadosUser['id_permission_group'] === $itens['id'])?'selected':''; ?> value="<?php echo $itens['id'];?>"><?php echo $itens['name'];?></option>
                            <?php endForeach;?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Informações Parametros Liberados</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <?php 
                            foreach ($permission_params as $items) {
                                foreach ($permission_group_params as $value) {
                                    if($items['slug'] == $value){
                            ?>
                            <li><a href="#"><?php echo $items['name'];?></a></li>
                                <?php
                                    }
                                }
                            } ?>
                          </ul>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Empresas que o Usuário Gerencia</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <?php foreach ($listEmpresas as $items) { ?>
                                       <li><a href="#"><?php echo $items['raz'];?></a></li>
                                <?php } ?>

                            </ul>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->