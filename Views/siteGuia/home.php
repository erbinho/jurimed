<div class="container d-flex">
	<img class="icones" src="<?php echo BASE_URL;?>/assets/images/icoPremium.svg"><h1 class="h4 empPremium">Empresas Premiun</h1>
</div>
<div class="container">
	<div class="row d-flex justify-content-center">
		<?php
		if(!empty($listEmpPremium)){
			foreach ($listEmpPremium as $empPremium) {
			?>
				<div class="FeaturedCompany">
					<div class="imgCompany">
						<div class="imgLogo">
						<?php if (!empty($empPremium['logo'])){ ?>
							<img src="<?php echo BASE_URL;?>/assets/images/imgGuia/logos/<?php echo $empPremium['logo'];?>">
						<?php }else{ ?>
							<img src="<?php echo BASE_URL;?>/assets/images/imgGuia/logoEmpty.jpg">
						<?php }	?>
						</div>
					</div>
					<div class="infoCompany">
						<div class="nomeEmp">
							<h2><?php echo $empPremium['nomeFantasia'];?></h2>
						</div>
						<div class="catEmp">
							<label><strong>Categoria: </strong><?php echo $empPremium['Categoria'];?></label>
						</div>
					</div>
					<div class="opcCompany">
						<div class="btn btn-warning btnFone">
							<a href="<?php echo BASE_URL;?>/GuiaEmpresa/empresa/<?php echo $empPremium['idEmpresa'];?>">Ver Telefones</a>
						</div>
						<div class="icoOpc" style="margin-left: 20px;">
							<img src="<?php echo BASE_URL;?>/assets/images/icoMap.svg" width="15"></a>
							<img src="<?php echo BASE_URL;?>/assets/images/icoEmail.svg" width="15"></a>
							<img src="<?php echo BASE_URL;?>/assets/images/icoPhoto.svg" width="15"></a>
						</div>
					</div>
				</div>
			<?php }
		}else{ ?>
			<div class="emptyInfo">
			  	<h2 style="color: #ccc; font-size: 33px;">Não possui empresas em Destaques!</h2>
			</div>
		<?php }?>
	</div>
</div>

<div class="container d-flex">
	<img class="icones" src="<?php echo BASE_URL;?>/assets/images/icoCompany.svg"><h1 class="h4 empPremium">Outras Empresas</h1>
</div>
<div class="container">
	<div class="row justify-content-md-center">
		<?php 
		foreach ($listEmpresas as $empresas) { ?>
			<div class="col- col-sm-5 itemEmpPremium">
				<a href="<?php echo BASE_URL;?>/GuiaEmpresa/empresa/<?php echo $empresas['idEmpresa'];?>" class="text-secondary" style="cursor: pointer;">
					<div class="areaEmpreMini">
						<div class="borderImg">
						<?php if(!empty($empresas['logo'])){ ?>
							<img src="<?php echo BASE_URL;?>/assets/images/imgGuia/logos/<?php echo $empresas['logo'];?>">
						<?php }else{ ?>
							<img src="<?php echo BASE_URL;?>/assets/images/imgGuia/logoEmpty.jpg">
						<?php } ?>
						</div>
						<div class="textEmpPremium">
							<label class="text-secondary tituloText" style="cursor: pointer;"><strong><?php echo $empresas['nomeFantasia']; ?></strong></label>
							<label class="descEnd" style="text-decoration: none; font-size: 14px; height: 35px;"><strong>End: </strong><?php echo $empresas['Endereco']; ?></label>
							<label class="descEnd" style="text-decoration: none; font-size: 14px;"><strong>Cidade: </strong><?php echo $empresas['Cidade'];?> - <?php echo $empresas['siglaEstado'];?></label>
						</div>
					</div>
				</a>
			</div>
		<?php }	?>
	</div>
</div>

