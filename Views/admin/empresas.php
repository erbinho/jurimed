<section class="content-header">
    <h1>
        Empresas
        <small><strong><?php //echo $dadosEmp[0]['nomeFantasia'];?></strong></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">	

    <?php if($user->hasPermissions('permission_view')): ?>
        
    <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Empresas que você administra</h3>

                <div class="box-tools">
                    <a href="<?php echo BASE_URL; ?>/Dashboard"><button class="btn btn-success"><i class="fa fa-arrow-left"></i> Voltar</button></a>                  
                </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Razão</th>
                      <th>Opções</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($empresas[0]) > 1): ?>
                        <?php foreach($empresas as $emp): ?>
                            <tr>
                                <td><?php echo $emp['id']; ?></td>
                                <td><?php echo $emp['raz']; ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#modalEmp<?php echo $emp['id']; ?>" data-id="<?php echo $emp['id']; ?>" href="#" class="btn btn-xs btn-primary modalEditEmp1 editaEmp">Editar</a>
                                    <a href="<?php echo BASE_URL; ?>/Dashboard/empresas/excluir/<?php echo $emp['id']?>" class="btn btn-xs btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php else: ?>
                        <tr>
                            <td class="text-center" colspan="3"><?php echo $empresas[0]['raz']; ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-6 update-empresa" style="display: none;">

            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Empresa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" name="update-empresa">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="id_user" value="">
                    <input type="hidden" name="id_bairro" value="">
                    <input type="hidden" name="id_endereco" value="">
                    <input type="hidden" name="id_cidade" value="">
                    <input type="hidden" name="id_estado" value="">
                    <input type="hidden" name="id_cep" value="">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome Fantasia</label>
                      <input type="text" name="nomeFantasia" class="form-control" placeholder="">
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Telefone</label>
                              <input type="text" name="telefone" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Celular</label>
                              <input type="text" name="celular" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Cep</label>
                              <input type="text" name="cep" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-10">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Endereço</label>
                                <input type="text" name="endereco" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label>Nº</label>
                            <input class="form-control" type="text" name="numeroEndereco"></input>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bairro</label>
                                <input type="text" name="bairro" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label>Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value=""></option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="ES">Estrangeiro</option>
                            </select>
                        </div>
                        <div class="col-xs-5">
                            <label>Cidade</label>
                            <input class="form-control" type="text" name="cidade"></input>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputFile">Alterar Logo da Empresa</label>
                      <input type="file" name="logo">
                      <!-- <div id="file_logo_upload">Upload</div> -->
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <strong>Atendimento</strong>
                            <div class="form-group dia-atd">
                                <input type="text" name="dia[]" value="Domingo" disabled>
                                <input type="text" name="dia[]" value="Segunda" disabled>
                                <input type="text" name="dia[]" value="Terça" disabled>
                                <input type="text" name="dia[]" value="Quarta" disabled>
                                <input type="text" name="dia[]" value="Quinta" disabled>
                                <input type="text" name="dia[]" value="Sexta" disabled>
                                <input type="text" name="dia[]" value="Sábado" disabled>
                                <!-- <div id="file_logo_upload">Upload</div> -->
                            </div>
                            
                        </div>

                        <div class="col-xs-4">
                            <div class="col-xs-6">
                            <strong>Abre</strong>
                                 <div class="form-group abre-atd">
                                    
                                    
                                    <!-- <div id="file_logo_upload">Upload</div> -->
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <strong>Fecha</strong>
                                 <div class="form-group fecha-atd">
                                    
                                    <!-- <div id="file_logo_upload">Upload</div> -->
                                </div>
                            </div>

                        </div>


                    </div>

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <button name="closeUpdateEmpresa" type="submit" class="btn btn-danger">Fechar</button>
                  </div>
                </form>
              </div>
            
        </div>

    </div>

    <?php endif; ?>

</section>