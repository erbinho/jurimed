<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small>Cadastramento de Parametros de Permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li><a href="<?php echo BASE_URL;?>/Permissions">Parametros de Permissões</a></li>
        <li class="active">Adicionar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <form method="POST" action="<?php echo BASE_URL;?>/Permissions/parametrosAdd_Action">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cadastrar Novo Parametro</h3>
                <div class="box-tools">
                    <input type="submit" class="btn btn-success" value="Salvar" />
                </div>
            </div>
            <div class="box-body">

                <div class="form-group <?php echo (in_array('name', $errorItens))?'has-error':''; ?>">
                    <label for="group_name">Nome do Parametro</label>
                    <input type="text" class="form-control" id="group_name" name="nameParams" />
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 <?php echo (in_array('slug', $errorItens))?'has-error':''; ?>">
                        <label for="group_name">Tag do Parametro (Uso de Desenvolvedor)</label>
                        <input type="text" class="form-control" id="group_name" name="slugParams" />
                    </div>
                    <div class="col-md-6">
                        <label for="group_name">Categoria do Parametro:</label>
                        <select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="paramCateg">
                            <?php foreach ($permission_params_categ as $itens):?>
                               <option value="<?php echo $itens['id'];?>"><?php echo $itens['categoria'];?></option>
                            <?php endForeach;?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- /.content -->