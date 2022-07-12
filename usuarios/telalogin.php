<?php

include('../funcoes.php');

?>

<title>Tela de Login</title>


<style>
  span.field-icon {
    float: right;
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
    z-index: 2;
}
</style>

    <main>
    <?php 
      include "../interfaces/header.php";
?>
    <div class="row container">
        
    <form action = "login.php" method = "post" enctype = "multipart/form-data" class="col s12">


    <div class="row">
      <div class="col s6">
        <div class="center">
        <h5 class = "white-text"> <?=exibeMensagens()?> </h5>
        </div>
      </div>
    </div>

      <div class="row">
        <div class="input-field col s12">
          <input id = "emailx" type = "email" name = "email" class = "validate">
          <label for="emailx">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id = "senha" name = "senha" type="password" class="validate">
          <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for="senha">Senha</label>
          
        </div>
      </div>
      <a href="formRecuperarSenha.php" class="btn grey darken-1 waves-ligh waves-effect white-text">Esqueci minha senha</a>
      <button style = "margin-left:33%;" class="btn-floating waves-effect waves-light grey darken-1" type="submit" name="action">
    <i class="material-icons right">check</i>
  </button>
    </form>
  </div>

    </main>



<?php require "../interfaces/footer.php"; ?>



