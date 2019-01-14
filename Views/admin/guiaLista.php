<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Guia de Empresa
        <small>Lista de Empresas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Guia de Empresa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Empresas</h3>
            <div class="box-tools pull-right" style="display: flex; cursor: pointer;">
                <div class="iradio checked hover" style="margin-right: 10px; cursor: pointer;">
                    <input type="radio" id="ativo" name="status" value="a" checked>
                    <label for="ativo" style="cursor: pointer;"> Ativas </label>
                </div>
                <div class="iradio checked hover">
                    <input type="radio" id="inativo" name="status" value="i">
                    <label for="inativo" style="cursor: pointer;"> Inativas </label>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="lista" class="table table-striped table-bordered table-hover" role="grid">
                <thead class="thead-dark">
                    <tr role="row">
                        <th width="5%">Status</th>
                        <th>CNPJ</th>
                        <th>EMPRESA</th>
                        <th width="10%" align="center">OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</section>