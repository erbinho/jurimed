<div class="container">
    <h2 class="moduleTitle">
        <span>Redefinir Senha:</span>
    </h2>
    <form method="POST" class="formu-login" action="<?php echo BASE_URL;?>/Login/NewPassword">
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <div class="input-group-text">Inserir</div>
            </div>
            <input type="password" name="senha" class="form-control input-group-lg sender_new" placeholder="Insira sua nova Senha">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <div class="input-group-text">Repetir</div>
            </div>
            <input type="password" name="repetir" class="form-control input-group-lg sender_repeat" placeholder="Repita Senha">
        </div>
        <br>
      <div class="send-area-btn"></div>
        <div class="form-group">
            <input type="hidden" name="user" value="<?php echo $dadosUser['id_user'];?>">
          <input class="btn btn-warning btn-lg send_btn" type="submit" value="ENVIAR" disabled/>
        </div>
    </form>
</div>