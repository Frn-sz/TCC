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
<body>
    <main>
    <?php 
      include "../interfaces/header.php";
?>
    <div class="row container">
        
    <form action = "login.php" method = "post" enctype = "multipart/form-data" class="col s12">


    <div class="row">
      <div class="col s6">
        <h5 clas = "red darken-4"> <?= exibeMensagens() ?> </h5>
      </div>
    </div>

      <div class="row">
        <div class="input-field col s12">
          <input id = "email" type = "email" name = "email" class = "validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id = "senha" name = "senha" type="password" class="validate">
          <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for="senha">Senha</label>
          
        </div>
      </div>
      <a href="formRecuperarSenha.php" class="btn-flat blue darken-4 waves-ligh waves-effect white-text">Esqueci minha senha</a>
      <button style = "margin-left:50%;" class="btn-floating waves-effect waves-light blue darken-4" type="submit" name="action">
    <i class="material-icons right">check</i>
  </button>
    </form>
  </div>

    </main>
</body>


<?php require "../interfaces/footer.php"; ?>


