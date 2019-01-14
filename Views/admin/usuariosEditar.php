<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small>Editar Informações do Usuário</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Painel Inicial</a></li>
        <li><a href="<?php echo BASE_URL;?>/Usuarios">Usuários</a></li>
        <li class="active">Editar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">
        	<!-- Profile Image -->
          	<div class="box box-primary">
            	<div class="box-body box-profile">
              		<img class="profile-user-img img-responsive img-circle" alt="User profile picture" 
             		src="<?php echo BASE_URL ?>/assets/images/fotoUser/<?php echo (!empty($dadosUser["retrato_foto"]))?$dadosUser["retrato_foto"]:'default.jpg';?>" />

              		<h3 class="profile-username text-center"><?php echo $dadosUser["nome"];?></h3>

              		<p class="text-muted text-center"><a href="#" class="btn btn-primary">Alterar Foto</a></p>
            	</div>
            	<!-- /.box-body -->
          	</div>
          	<!-- /.box -->
          	<!-- About Me Box -->
          	<div class="box box-primary">
            	<div class="box-header with-border">
              		<h3 class="box-title">Outros Dados</h3>
            	</div>
            	<!-- /.box-header -->
            	<div class="box-body">
              		<strong><i class="fa  fa-building"></i> Empresas que Gerencia:</strong>
              		<ul class="nav nav-stacked">
                        <?php foreach ($listEmpresas as $items) { ?>
                           <li><a href="#"><?php echo $items['raz'];?></a></li>
                        <?php } ?>
                    </ul>
              	<hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Cidade e Região:</strong>
              <p class="text-muted"><?php echo $dadosUser["cidade"];?> - <?php echo $dadosUser["uf"];?></p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>Data do Ultimo Acesso</strong>
              <p>Logou no ultimo dia: 02/01/2019</p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        	<form class="form-horizontal">
	          	<div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#acesso" data-toggle="tab">Dados do Acesso</a></li>
		              <li><a href="#dados" data-toggle="tab">Dados da Pessoa</a></li>
		              <li><a href="#endereco" data-toggle="tab">Endereço</a></li>
		              <li><a href="#documentos" data-toggle="tab">Documentos</a></li>
		              <li><a href="#contato" data-toggle="tab">Contatos</a></li>
		            </ul>
	            	<div class="tab-content">
	            		<div class="tab-pane active" id="acesso">
			                <div class="form-group">
		                    	<label for="inputNome" class="col-sm-2 control-label">Nome Completo:</label>
			                    <div class="col-sm-10">
			                      	<input type="text" class="form-control" id="inputName" value="<?php echo $dadosUser["nome"];?>" name="nomeUser">
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                    	<label for="inputApelido" class="col-sm-2 control-label">Apelido:</label>
			                    <div class="col-sm-10">
			                      	<input type="text" class="form-control" id="inputApelido" value="<?php echo $dadosUser["apelido"];?>" name="apelidoUser" placeholder="Como deseja ser Chamado?">
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                    	<label class="col-sm-2 control-label">Login:</label>
			                    <div class="col-sm-6">
			                      	<input type="text" class="form-control" value="<?php echo $dadosUser["Username"];?>" placeholder="Nº do Cartão de Acesso" disabled>
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                    	<label for="inputSenha" class="col-sm-2 control-label">Alterar Senha:</label>
			                    <div class="col-sm-4">
			                      	<input type="password" class="form-control" id="inputSenha" name="newSenha" placeholder="">
			                    </div>
			                    <label for="inputPass" class="col-sm-2 control-label">Repetir Senha:</label>
			                    <div class="col-sm-4">
			                      	<input type="password" class="form-control" id="inputPass" placeholder="">
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                    	<label class="col-sm-2 control-label">Perfil de Acesso:</label>
			                    <div class="col-sm-6">
			                      	<input type="text" class="form-control" value="<?php echo $dadosUser["permission_group"];?>" disabled />
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                    	<label for="inputName" class="col-sm-2 control-label">E-mail:</label>
			                    <div class="col-sm-10">
			                      	<input type="email" class="form-control" value="<?php echo $dadosUser["EmailUser"];?>" name="emailUser" />
			                    </div>
		                  	</div>
			            </div>
	            		<div class="tab-pane" id="dados">
	              			<div class="form-group">
	                			<label class="col-sm-2 control-label" for="inputName">Sexo:</label>
	            				<div class="col-sm-10">
	              					<select class="form-group select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sexoUser">
	            						<option value="0">Selecione...</option>
	            						<option value="f" <?php echo ($dadosUser["Sexo"] == 'f')?'selected':'';?>>(F)eminino</option>
	            						<option value="m" <?php echo ($dadosUser["Sexo"] == 'm')?'selected':'';?>>(M)asculino</option>
	        						</select>
	                			</div>
	              			</div>
	              			<div class="form-group">
	                			<label class="col-sm-2 control-label" for="inputEmail">Estado Civil</label>
	            				<div class="col-sm-10">
	                  				<select class="form-group select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="estadoCivil">
	            						<option value="0" selected>Selecione...</option>
	            						<option value="s" <?php echo ($dadosUser["EstadoCivil"] == 's')?'selected':'';?>>Solteiro(a)</option>
	            						<option value="c" <?php echo ($dadosUser["EstadoCivil"] == 'c')?'selected':'';?>>Casado(a)</option>
	            						<option value="u" <?php echo ($dadosUser["EstadoCivil"] == 'u')?'selected':'';?>>União Estável</option>
	            						<option value="d" <?php echo ($dadosUser["EstadoCivil"] == 'd')?'selected':'';?>>Divorciado(a)</option>
	            						<option value="v" <?php echo ($dadosUser["EstadoCivil"] == 'v')?'selected':'';?>>Viúvo(a)</option>
	        						</select>
	                  			</div>
	              			</div>
	              			<div class="form-group">
	              				<label class="col-sm-2 control-label" for="inputDate">Data de Nascim.:</label>
	              				<div class="col-sm-10">
	              					<div class="input-group">
	              						<div class="input-group-addon">
	                						<i class="fa fa-calendar"></i>
	     								</div>
	              						<input class="form-control" type="date" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $dadosUser["DataNascimento"];?>" name="inputDate">
	            					</div>
	              				</div>
	             			 </div>
	              		</div>
	              		<div class="tab-pane" id="endereco">
	          				<div class="form-group">
		                    	<label for="inputEndereco" class="col-sm-2 control-label">Endereço:</label>
			                    <div class="col-sm-10">
			                      	<input type="text" class="form-control" id="inputEndereco" value="<?php echo $dadosUser["EnderecoUser"];?>" name="enderecoUser" placeholder="Rua Exemplo / Av. Exemplo / etc...">
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                  		<label for="inputNumero" class="col-sm-2 control-label">Nº:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputNumero" value="<?php echo $dadosUser["NumeroCasa"];?>" name="numeroUser" placeholder="Nº da Residência.">
			                    </div>
			                    <label for="inputComp" class="col-sm-2 control-label">Complemento:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputComp" value="<?php echo $dadosUser["Complemento"];?>" name="complementoUser">
			                    </div>
			                </div>
			                <div class="form-group">
		                  		<label for="inputBairro" class="col-sm-2 control-label">Bairro:</label>
			                    <div class="col-sm-10">
			                      	<input type="text" class="form-control" id="inputBairro" value="<?php echo $dadosUser["BairroUser"];?>" name="bairroUser">
			                    </div>
			                </div>
			                <div class="form-group">
			                	<label for="inputCidade" class="col-sm-2 control-label">Cidade:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputCidade" value="<?php echo $dadosUser["cidade"];?>" name="cidadeUser">
			                    </div>
			                	<label for="inputName" class="col-sm-2 control-label">Estado:</label>
			                	<div class="col-sm-4">
				                    <select class="form-group select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="estadoUser">
	            						<option value="0">Selecione um Estado...</option>
	            						<option value="AC" <?php echo ($dadosUser["uf"] == 'AC')?'selected':'';?>>Acre</option>
	            						<option value="AL" <?php echo ($dadosUser["uf"] == 'AL')?'selected':'';?>>Alagoas</option>
	            						<option value="AP" <?php echo ($dadosUser["uf"] == 'AP')?'selected':'';?>>Amapá</option>
	            						<option value="AM" <?php echo ($dadosUser["uf"] == 'AM')?'selected':'';?>>Amazonas</option>
	            						<option value="BA" <?php echo ($dadosUser["uf"] == 'BA')?'selected':'';?>>Bahia</option>
	            						<option value="CE" <?php echo ($dadosUser["uf"] == 'CE')?'selected':'';?>>Ceará</option>
	            						<option value="DF" <?php echo ($dadosUser["uf"] == 'DF')?'selected':'';?>>Distrito Federal</option>
	            						<option value="ES" <?php echo ($dadosUser["uf"] == 'ES')?'selected':'';?>>Espírito Santo</option>
	            						<option value="GO" <?php echo ($dadosUser["uf"] == 'GO')?'selected':'';?>>Goiás</option>
	            						<option value="MA" <?php echo ($dadosUser["uf"] == 'MA')?'selected':'';?>>Maranhão</option>
	            						<option value="MT" <?php echo ($dadosUser["uf"] == 'MT')?'selected':'';?>>Mato Grosso</option>
	            						<option value="MS" <?php echo ($dadosUser["uf"] == 'MS')?'selected':'';?>>Mato Grosso do Sul</option>
	            						<option value="MG" <?php echo ($dadosUser["uf"] == 'MG')?'selected':'';?>>Minas Gerais</option>
	            						<option value="PA" <?php echo ($dadosUser["uf"] == 'PA')?'selected':'';?>>Pará</option>
	            						<option value="PB" <?php echo ($dadosUser["uf"] == 'PB')?'selected':'';?>>Paraíba</option>
	            						<option value="PR" <?php echo ($dadosUser["uf"] == 'PR')?'selected':'';?>>Paraná</option>
	            						<option value="PE" <?php echo ($dadosUser["uf"] == 'PE')?'selected':'';?>>Pernambuco</option>
	            						<option value="PI" <?php echo ($dadosUser["uf"] == 'PI')?'selected':'';?>>Piauí</option>
	            						<option value="RJ" <?php echo ($dadosUser["uf"] == 'RJ')?'selected':'';?>>Rio de Janeiro</option>
	            						<option value="RN" <?php echo ($dadosUser["uf"] == 'RN')?'selected':'';?>>Rio Grande do Norte</option>
	            						<option value="RS" <?php echo ($dadosUser["uf"] == 'RS')?'selected':'';?>>Rio Grande do Sul</option>
	            						<option value="RO" <?php echo ($dadosUser["uf"] == 'RO')?'selected':'';?>>Rondônia</option>
	            						<option value="RR" <?php echo ($dadosUser["uf"] == 'RR')?'selected':'';?>>Roraima</option>
	            						<option value="SC" <?php echo ($dadosUser["uf"] == 'SC')?'selected':'';?>>Santa Catarina</option>
	            						<option value="SP" <?php echo ($dadosUser["uf"] == 'SP')?'selected':'';?>>São Paulo</option>
	            						<option value="SE" <?php echo ($dadosUser["uf"] == 'SE')?'selected':'';?>>Sergipe</option>
	            						<option value="TO" <?php echo ($dadosUser["uf"] == 'TO')?'selected':'';?>>Tocantins</option>
	        						</select>
	    						</div>
			                </div>
			                <div class="form-group">
			                	<label for="inputCep" class="col-sm-2 control-label">CEP:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputCep" value="<?php echo $dadosUser["CepUser"];?>" name="cepUser">
			                    </div>
			                </div>
						</div>
						<div class="tab-pane" id="documentos">
	          				<div class="form-group">
		                    	<label for="inputCpf" class="col-sm-4 control-label">CPF:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputCpf" value="<?php echo $dadosUser["CPF"];?>" name="cpfUser" placeholder="___.___.___-__">
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                  		<label for="inputRg" class="col-sm-4 control-label">RG:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputRg" value="<?php echo $dadosUser["RG"];?>" name="rgUser" placeholder="__.___.___-_">
			                    </div>
			                </div>
			                <div class="form-group">
		                  		<label for="inputCtbs" class="col-sm-4 control-label">CTBS:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputCtbs" value="<?php echo $dadosUser["CarteiraTrabalho"];?>" name="ctbsUser">
			                    </div>
			                </div>
			                <div class="form-group">
		                  		<label for="inputPisPas" class="col-sm-4 control-label">PIS/PASEP/CI:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputPisPas" value="<?php echo $dadosUser["PISPAS"];?>" name="pisPasUser">
			                    </div>
			                </div>
			            </div>
			            <div class="tab-pane" id="contato">
			                <div class="form-group">
		                    	<label for="inputFone" class="col-sm-4 control-label">Telefone:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputFone" value="<?php echo $dadosUser["Telefone"];?>" name="foneFixo" placeholder="(__) ____-____">
			                    </div>
		                  	</div>
		                  	<div class="form-group">
		                  		<label for="inputCel" class="col-sm-4 control-label">Celular:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputCel" value="<?php echo $dadosUser["Celular"];?>" name="foneCel" placeholder="(__) _ ____-____">
			                    </div>
			                </div>
			                <div class="form-group">
		                  		<label for="inputSocial" class="col-sm-4 control-label">Rede Social / WebSite:</label>
			                    <div class="col-sm-4">
			                      	<input type="text" class="form-control" id="inputSocial" value="<?php echo $dadosUser["home"];?>" name="socialWeb">
			                    </div>
			                </div>
			            </div>
			            <hr>
		                <div class="row no-print">
					        <div class="col-xs-12">
					          	<input type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;" value="Salvar" />
					        </div>
				      	</div>
	        		</div>
	          	</div>
          	</form>
        </div>
   </div>
</section>
<!-- /.content -->