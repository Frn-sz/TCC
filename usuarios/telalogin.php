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
    color: white !important;
  }

  input {
    color: white;
  }

  label {
    color: white !important;
  }

  .formLogin {

    padding-left: 15px !important;
    padding-right: 15px !important;
    border-radius: 10px !important;
  }

  .buttonCheck {
    margin-left: 30%;
  }

  .passButton {
    background-color: white !important;
    color: black !important;
    font-weight: bold;

  }
</style>
<?php
include "../interfaces/header.php";
?>
<main>
  <br><br><br><br>

  <div class="container formLogin">

    <form action="login.php" method="post" enctype="multipart/form-data">


      <div class="row">
        <div class="col s12">
          <div class="center">
            <h4 class="center white-text"><?= exibeMensagens() ?></h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="input-field">
          <input id="emailx" type="email" name="email" class="validate" required>
          <label for="emailx">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input id="senha" name="senha" type="password" class="validate" required>
          <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for="senha">Senha</label>

        </div>
      </div>

      <a href="formRecuperarSenha.php" class="btn waves-ligh waves-effect passButton">Esqueci minha senha</a>
      <button class="btn-floating waves-effect waves-light white buttonCheck" type="submit" name="action">
        <i class="material-icons black-text ">check</i>
      </button>

    </form>
    <br>
  </div>

</main>



<?php require "../interfaces/footer.php"; ?>