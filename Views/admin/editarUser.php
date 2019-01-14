<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Perfil do Usuário
        <small>Edição de Dados</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL;?>/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Editar Perfil</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
	<div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Dados - Cadastro de Usuário</h3>
        </div>
        <div class="box-body">
            <div class="row">
            	<div class="col-md-3 text-center" style="display: flex; flex-direction: column; align-items: center;">
            		<img src="<?php echo BASE_URL;?>/assets/images/fotoUser/<?php echo $_SESSION['infoUserLogon']['retrato_foto'];?>" class="img" alt="User Image" style="border: 3px solid #f39c12; border-radius: 20px; margin-bottom: 5px;	" width="180px;">
            		<label class="btn btn-success btn-xs">Alterar Foto de Perfil</label>
            	</div>
            	<div class="col-md-9">
            		<form role="form">
                		<!-- text input -->
                		<div class="form-group">
                  			<label>Nome Completo</label>
                  			<input type="text" class="form-control" value="<?php echo $_SESSION['infoUserLogon']['nome'];?>">
						</div>
						<br/>		
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
		                			<label>Data de Nascimento:</label>
		                			<div class="input-group date">
		                				<div class="input-group-addon">
		                					<i class="fa fa-calendar"></i>
		                				</div>
		                				<input type="text" class="form-control pull-right" id="datepicker">
		                			</div>
	                			</div>
	                			<div class="col-md-4">
					              <div class="form-group">
					                	<label>Estado Civil</label>
					                	<select class="form-control select2" style="width: 100%;">
					                  		<option selected="selected">Solteiro</option>
					                  		<option>Casado</option>
					                  		<option>Separado</option>
					                  		<option>Divorciado</option>
				                  			<option>Viúvo</option>
					                  		<option>Outros</option>
				                		</select>
				              		</div>
				              	</div>
				              	<div class="col-md-4">
				              		<div class="form-group">
					                	<label>Sexo:</label>
					                	<select class="form-control select2" style="width: 100%;">
											<option selected="selected">Masculino</option>
											<option>Feminino</option>
											<option>Outros</option>
					                	</select>
					                </div>
					            </div>
			              	</div>
			          	</div>
		            </form>
            	</div>
            </div>
        </div>
    </div>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Complemento - Cadastro de Usuário</h3>
        </div>
        <div class="box-body">
			<form role="form">	
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
                			<label>Endereço:</label>
                			<input type="text" class="form-control" value="<?php echo $_SESSION['infoUserLogon']['endereco'];?>">
            			</div>
            			<div class="col-md-2">
			              	<label>Numero:</label>
                			<input type="text" class="form-control pull-right" id="datepicker">
		              	</div>
		              	<div class="col-md-3">
			              	<label>Complemento:</label>
                			<input type="text" class="form-control pull-right" id="datepicker">
		              	</div>
		              	<div class="col-md-4">
			              	<label>Bairro:</label>
                			<input type="text" class="form-control pull-right" id="datepicker">
		              	</div>
		            </div>
		            <div class="row">
		              	<div class="col-md-6">
			              	<label>Cidade:</label>
                			<input type="text" class="form-control pull-right" id="datepicker">
		              	</div>
		              	<div class="col-md-3">
			              	<label>Estado:</label>
                			<input type="text" class="form-control pull-right" id="datepicker">
		              	</div>
		              	<div class="col-md-3">
			              	<label>CEP:</label>
                			<input type="text" class="form-control pull-right" id="datepicker">
		              	</div>
	              	</div>
	          	</div>
            </form>
        </div>
    </div>
</section>