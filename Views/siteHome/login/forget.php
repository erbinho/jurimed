<div class="container">
	<h2 class="moduleTitle">
		<span>Esqueci a Minha Senha</span>
	</h2>
	<form method="POST" class="formu-login" action="<?php echo BASE_URL;?>/Login/Forget">
        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
  		<div class="input-group input-group-lg">
    		<div class="input-group-prepend">
      			<div class="input-group-text">@</div>
    		</div>
    		<input type="email" name="email" class="form-control input-group-lg" id="inlineFormInputGroupUsername2" placeholder="Informe seu E-mail">
  		</div>
  		<br>
        <div class="form-group">
            <input class="btn btn-warning btn-lg" type="submit" value="ENVIAR" />
        </div>
    </form>
</div>