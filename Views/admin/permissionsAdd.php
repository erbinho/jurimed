<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small>Cadastramento de Grupos de Permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li><a href="<?php echo BASE_URL;?>/Permissions">Grupo de Permissões</a></li>
        <li class="active">Adicionar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <form method="POST" action="<?php echo BASE_URL;?>/Permissions/add_Action">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cadastrar Novo Grupo</h3>
                <div class="box-tools">
                    <input type="submit" class="btn btn-success" value="Salvar" />
                </div>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo (in_array('name', $errorItens))?'has-error':''; ?>">
                    <label for="group_name">Nome do Grupo</label>
                    <input type="text" class="form-control" id="group_name" name="name" />
                </div>
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
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body">
                        <?php 
                        foreach ($permission_params as $itens){
                            if($itemCateg['id'] == $itens['idCateg']){
                        ?>
                            <div class="form-group">
                                <input type="checkbox" value="<?php echo $itens['id'];?>" id="item-<?php echo $itens['id'];?>"/>
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






<?php foreach ($permission_params as $itens){ ?>
    <!--<div class="form-group">
        <input type="checkbox" name="itens[]" value="<?php echo $itens['id'];?>" id="item-<?php echo $itens['id'];?>" />
        <label for="item-<?php echo $itens['id'];?>"><?php echo $itens['name'];?></label>
    </div>-->
<?php } ?>