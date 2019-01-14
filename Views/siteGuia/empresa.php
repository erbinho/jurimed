<?php
	foreach ($infoCompany as $infoCompany) {
?>
<div class="container">
    <ol class="breadcrumb breadcrumb-arrow" style="margin-top: 5px;">
		<li><a href="<?php echo BASE_URL;?>/GuiaEmpresa/">Guia de Empresas</a></li>
		<li><a href="<?php echo BASE_URL;?>/GuiaEmpresa/lista/<?php echo $infoCompany['idCategoria'];?>"><?php echo $infoCompany['Categoria'];?></a></li>
		<li class="active"><span><?php echo $infoCompany['nomeFantasia'];?></span></li>
	</ol>
	<div class="breadcrumb breadcrumb-mob" style="display: none; font-size: 12px; margin-top: 5px;">
		<a class="breadcrumb-item" href="<?php echo BASE_URL;?>/GuiaEmpresa/">Guia de Empresas</a>
		<a class="breadcrumb-item" style="white-space: nowrap; min-width: 13em; overflow: hidden; text-overflow: ellipsis; cursor: pointer;" href="<?php echo BASE_URL;?>/GuiaEmpresa/lista/<?php echo $infoCompany['idCategoria'];?>"><?php echo $infoCompany['Categoria'];?></a>
		<span class="breadcrumb-item active" style="white-space: nowrap; min-width: 13em; overflow: hidden; text-overflow: ellipsis; cursor: pointer;"><?php echo $infoCompany['nomeFantasia'];?></span>
	</div>
</div>
<div class="container">
	<?php if(!empty($infoCompany['guiaHeader'])){ ?>
	<div class="topoCompany" style="background-image: url(<?php echo BASE_URL;?>/assets/images/imgGuia/headers/<?php echo $infoCompany['guiaHeader'];?>);">
	<?php }else{ ?>
	<div class="topoCompany" style="background-image: url(<?php echo BASE_URL;?>/assets/images/imgGuia/headerBg.jpg);">
	<?php } ?>
		<div class="logoCompany">
			<?php if(!empty($infoCompany['logo'])){ ?>
				<img src="<?php echo BASE_URL;?>/assets/images/imgGuia/logos/<?php echo $infoCompany['logo'];?>">
			<?php }else{ ?>
				<img src="<?php echo BASE_URL;?>/assets/images/imgGuia/logoEmpty.jpg">
			<?php } ?>
		</div>
	</div>
	<div class="infoEmp">
		<label class="infoTitle"><?php echo $infoCompany['nomeFantasia'];?></label>
		<label class="evaluation">
			<strong>Avalie:</strong>
			<div class="barra">
				<span class="bg"></span>
				<div class="estrelas" data-type="<?php echo $totalAvalia;?>">
					<?php for($i=1; $i<=5; $i++){ ?>
						<?php if(!empty($_SESSION['infoUserLogon'])){ ?>
							<span class="star" id="<?php echo $i;?>" data-id="<?php echo $infoCompany['idEmpresa'];?>" data-type="<?php echo $_SESSION['infoUserLogon']['id'];?>" data-toggle="modal" data-target="#exampleModalCenter">
						<?php }else{ ?>
							<span class="star" id="<?php echo $i;?>" data-id="<?php echo $infoCompany['idEmpresa'];?>" data-type="">
						<?php } ?>
								<span class="starAbsolute" style="background-image: url(<?php echo BASE_URL;?>/assets/images/imgGuia/star.png"></span>
							</span>
					<?php } ?>
				</div>
			</div>
		</label>
	</div>
	<div class="dadosCompany">
		<div class="Address">
			<div class="titleImg">
				<img src="<?php echo BASE_URL;?>/assets/images/icoRoute.svg" width="35" height="35" >
				<h1 class="display-4" style="font-size: 28px;">Endereço:</h1>
			</div>
			<p class="EddressEmp text-center"><?php echo $infoCompany['Endereco'];?>, <?php echo $infoCompany['NumeroEndereco'];?> - <?php echo $infoCompany['Bairro'];?>, <?php echo $infoCompany['Cidade'];?> - <?php echo $infoCompany['siglaEstado'];?>, <?php echo $infoCompany['Cep'];?></p>
			<div id="map"></div>
		</div>
		<div class="Hour">
			<div class="titleImg">
				<img src="<?php echo BASE_URL;?>/assets/images/icoHora.svg" width="35" height="35" >
				<h1 class="display-4" style="font-size: 28px;">Atendimento:</h1>
			</div>
			<?php 
				$hora = date('H');
				
				$semana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');
				$diasemana_numero = date('w', strtotime(date('Y-m-d')));
				if(($hora < $abre) || ($hora > $fecha)){
					$msgExpediente = 'Fechado';
				}else{
					$msgExpediente = 'Aberto';
				}
			?>

			<div class="dadosExp">
				<div><?php echo $semana[diaAtendimento()];?> das <strong><?php echo $abre.':00';?></strong> às <strong><?php echo $fecha.':00';?></strong></div>
				<label style="color:#F44336; font-weight: bold; text-align: center; width: 100%;"><?php echo $msgExpediente;?></label>
			</div>
			<div class="collapse dadosExpHide" id="collapseExample">
				<?php
				if(!empty($_SESSION['hashLogin'])){
					foreach($diasAtd as $atd):
				?>
							<div class="semanaExp"><?php echo $atd;?></div>
				<?php 
					endforeach; 
				}else{ ?>
					<div class="semanaExp"><strong>Realize login para ter acesso a demais Informações</strong></div>	
				<?php } ?>
			</div>
			<div class="separador" data-toggle="collapse" href="#collapseExample">
				<hr>
				<label>Ver horarios dos demais dias da semana</label>
			</div>
			<div class="phones">
				<div class="titleImg">
					<img src="<?php echo BASE_URL;?>/assets/images/icoFone.svg" width="35" height="35" >
					<h1 class="display-4" style="font-size: 28px;">Contato:</h1>
				</div>
				<div class="dadosPhone">
					<?php if(!empty($_SESSION['hashLogin'])){ ?>
						<?php if(!empty($infoCompany['TelefoneFixo'])){ ?>
							<label>Telefone: </label> <strong><?php echo $infoCompany['TelefoneFixo'];?></strong><br>
						<?php } else { ?>
							<label>Telefone: </label> <strong>Dados Faltando</strong><br>
						<?php } ?>
						
						<?php if(!empty($infoCompany['Celular'])){ ?>
							<label>Celular: </label> <strong><?php echo $infoCompany['Celular'];?></strong><br>
						<?php } else { ?>
							<label>Celular: </label> <strong>Dados Faltando</strong><br>
						<?php } ?>
					<?php } else { ?>
						<div class="semanaExp"><strong>Realize login para ter acesso a demais Informações</strong></div>	
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>



<!-- MODEL'S de MENSAGEM -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title text-center" id="exampleModalLongTitle">Deixe um comentario sobre a Empresa</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
       			</button>
      		</div>
   			<span class="badge badge-pill badge-light">Sua Avaliação é de <span class="reStar"></span> Estrelas</span>
      		<div class="modal-body">
        		<div class="form-group">
		    		<textarea class="form-control" id="AvalieComentario" rows="3" placeholder="Deixe em branco caso não queira comentar"></textarea>
		  		</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-warning btn_star" data-dismiss="modal">Salvar Avaliação</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="LongTitle">Atenção</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
				</button>
				</div>
    		<div class="modal-body text-center">
      			<h1 class="display-4 text-secondary" style="font-size: 18px;"id="msgAjax"></h1>
    		</div>
    	</div>
  	</div>
</div>