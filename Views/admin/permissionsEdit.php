<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small>Edição de Grupos de Permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li><a href="<?php echo BASE_URL;?>/Permissions">Grupo de Permissões</a></li>
        <li class="active">Editar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <form method="POST" action="<?php echo BASE_URL;?>/Permissions/edit_Action/<?php echo $permission_group_id;?>">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Editar Grupo</h3>
                <div class="box-tools">
                    <input type="submit" class="btn btn-success" value="Atualizar" />
                </div>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo (in_array('name', $errorItens))?'has-error':''; ?>">
                    <label for="group_name">Nome do Grupo</label>
                    <input type="text" class="form-control" id="group_name" name="name" value="<?php echo $permission_group_name; ?>" />
                </div>
                <hr>
                
            </div>
        </div>
        <h1>
        <small>Marque os Parametros de Permissão</small>
        </h1>
        <div class="row">
        <?php foreach ($permission_params_categ as $itemCateg) { ?>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $itemCateg['categoria'];?></h3>
                    </div>
                    <div class="box-body">
                        <?php 
                        foreach ($permission_params as $itens){
                            if($itemCateg['id'] == $itens['idCateg']){
                        ?>
                                <div class="form-group">
                                    <?php if($itemCateg['id'] != '6') { ;?>
                                        <input 
                                            <?php if(in_array($itens['slug'], $permission_group_params)){
                                                echo 'checked="checked"';
                                            }; ?> type="checkbox" name="itens[]" value="<?php echo $itens['id'];?>" id="item-<?php echo $itens['id'];?>" />
                                    <?php };?>
                                    <label for="item-<?php echo $itens['id'];?>"><?php echo $itens['name'];?></label>
                                </div>
                            <?php }
                            }?>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </form>
</section>
<!-- /.content -->