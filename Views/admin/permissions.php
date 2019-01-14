<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small>Lista de Grupos de Permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li class="active">Grupo de Permissões</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Grupos de Permissões</h3>
            <div class="box-tools">
                <?php if($user->hasPermissions('permission_group_add')):?>
                    <a href="<?php echo BASE_URL;?>/Permissions/add" class="btn btn-success">Adicionar Grupo</a>
                <?php endif;?>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <tr>
                    <th>Grupo da Permissão</th>
                    <th>Qtd. de Usuários Ativos</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($listGroup as $item) :?>
                    <tr>
                        <td><?php echo $item['name'];?></td>
                        <td width="200"><?php echo $item['total_users'];?></td>
                        <td width="130">
                            <div class="btn-group">
                                <a href="<?php echo BASE_URL.'/Permissions/edit/'.$item['id'];?>" class="btn btn-xs btn-primary">Editar</a>
                                <a href="<?php echo BASE_URL.'/Permissions/del/'.$item['id'];?>" class="btn btn-xs btn-danger <?php echo ($item['total_users'] != '0')?'disabled':'';?>">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->