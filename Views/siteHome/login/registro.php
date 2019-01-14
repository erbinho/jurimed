<div class="container">
	<h2 class="moduleTitle">
		<span>Crie sua nova conta.</span>
	</h2>
    <div class="msgAlertTop"></div>
	<form method="POST" onsubmit="return validarCampos()" class="needs-validation">
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="inputNome">Nome Completo:</label>
                <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Informe seu Nome" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputCPF">CPF: </label>
                <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="Informe seu CPF"  required>
                <div class="msgAlert" style="position: absolute;"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail">E-mail:</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Informe seu E-mail" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputSenha">Senha:</label>
                <input type="password" name="senha" class="form-control sender_new" id="inputSenha" placeholder="Insira uma Senha"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPass">Repetir Senha:</label>
                <input type="password" name="password" class="form-control sender_repeat" id="inputPass" required>
            </div>
            <div class="send-area-btn"></div>
        </div>
        <button type="submit" class="btn btn-warning">Cadastrar</button>
    </form>
</div>