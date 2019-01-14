<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small>Lista de Parametros de Permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li class="active">Paramentros de Permissões</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Parametros de Permissões</h3>
            <div class="box-tools">
                <a href="<?php echo BASE_URL;?>/Permissions/parametrosAdd" class="btn btn-success">Adicionar Parametros</a>
            </div>
        </div>
        <div class="box-body">
            <label>Filtre por uma Categoria de Parametros Específica</label><br>
            <select class=" form-group select2" style="width: 30%;" tabindex="-1" aria-hidden="true" name="paramCateg">
                <option value="0" selected>Todas as Categorias</option>
                <?php foreach ($permission_params_categ as $itens):?>
                    <option value="<?php echo $itens['categoria'];?>"><?php echo $itens['categoria'];?></option>
                <?php endForeach;?>
            </select>
            <hr>
            <table class="table">
                <tr>
                    <th>Nomes dos Parametros</th>
                    <th>Tag do Parametro (Uso para Desenvolvedor)</th>
                    <th>Categoria do Parametro</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($listGroup as $item) :?>
                    <tr>
                        <td><?php echo $item['name'];?></td>
                        <td><?php echo $item['slug'];?></td>
                        <td><?php echo $item['categoria'];?></td>
                        <td width="130">
                            <div class="btn-group">
                                <a href="<?php echo BASE_URL.'/Permissions/permissionsParamsEdit/'.$item['id'];?>" class="btn btn-xs btn-primary">Editar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->