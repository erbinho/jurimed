<?php if(!empty($avisoNo)){ ?>
	<div class="container">
		<div class="alert alert-danger" role="alert">
	  		<h4 class="alert-heading">Algo deu Errado!</h4>
			<p>Não Foi localizado nenhum cadastro com o E-mail: <a href="#" class="alert-link"><?php echo $avisoNo;?></a></p>
			<p>Verifique se o E-mail foi digitado corretamente e <a href="<?php echo BASE_URL;?>/Login/Forget" class="alert-link">tente novamente!</a></p>
	  		<hr>
	  		<p class="mb-0">Caso o erro ainda persista, por favor entre em contato com nossa Esquipe de Suporte que iremos ajudar!</p>
	  		<p class="mb-0"><a href="#" class="alert-link">OBS:</a> Sempre mantenha seu E-mail Atualizado, assim evita transtornos futuros!</p>
		</div>
	</div>
<?php }else if(!empty($avisoYes)){ ?>
	<div class="container">
		<div class="alert alert-success" role="alert">
	  		<h4 class="alert-heading">E-mail Enviado com Sucesso!</h4>
			<p><a href="#" class="alert-link"><?php echo $avisoYes;?></a></p>
			<p>Pode demorar uns 2 minutos para ser entregue em sua Caixa de entrada, caso não apareça verifique nas caixa de span ou lixo eletrônico.</p>
	  		<hr>
	  		<p class="mb-0">Não Recebeu o Link? <a href="<?php echo BASE_URL;?>/Login/Forget" class="alert-link">Clique Aqui</a> e tente novamente!</p>
		</div>
	</div>
<?php }else if(!empty($avisoCadYes)){ ?>
	<div class="container">
		<div class="alert alert-success" role="alert">
	  		<h4 class="alert-heading">Cadastro Realizado com Sucesso!</h4>
			<p><a href="#" class="alert-link"><?php echo $avisoCadYes;?></a></p>
			<p>Pode demorar uns 2 minutos para ser entregue em sua Caixa de entrada, caso não apareça verifique nas caixa de span ou lixo eletrônico.</p>
	  		<hr>
	  		<p class="mb-0">Não Recebeu o Link? <a href="<?php echo BASE_URL;?>/Login/Forget" class="alert-link">Clique Aqui</a> e tente novamente!</p>
		</div>
	</div>
<?php }else if(!empty($avisoAtivYes)){ ?>
	<div class="container">
		<div class="alert alert-success" role="alert">
	  		<h4 class="alert-heading">Conta Ativada com Sucesso!</h4>
			<p><a href="#" class="alert-link"><?php echo $avisoAtivYes;?></a></p>
	  		<p class="mb-0"><a href="<?php echo BASE_URL;?>/Login/" class="alert-link">Clique Aqui</a> para se logar!</p>
		</div>
	</div>
<?php } else { ?>
	<div class="container">
		<div class="alert alert-danger" role="alert">
	  		<h4 class="alert-heading">Link Expirado</h4>
			<p><a href="#" class="alert-link"><?php echo $avisoNoToken;?></a></p>
	  		<hr>
	  		<p class="mb-0"><a href="<?php echo BASE_URL;?>" class="alert-link">Clique Aqui</a> e tente novamente!</p>
		</div>
	</div>
<?php } ?>