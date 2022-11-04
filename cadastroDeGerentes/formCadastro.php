<title>Cadastro de Gerente</title>


<?php

include "../conecta.php";
include "../interfaces/header.php";
include "../funcoes.php";

?>
<style>
  input,
  textarea,
  select,
  option {
    color: white !important;
  }

  input {
    color: white;
  }

  label {
    color: white !important;
  }

  .formCadastro {
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 10px;
  }

  .input-field input[type=text]:focus {
    border-bottom: 1px solid white !important;
    box-shadow: 0 1px 0 0 black !important;
    box-shadow: 0 1px 0 0 white !important;

  }

  .userIcon {

    border-radius: 100% !important;
  }
</style>
<main>
  <br><br><br>
  <div class="row container formCadastro">
    <form class="formCadastroGerentes" action="cadastroGerente.php" method="post" enctype="multipart/form-data">

      <div class="row">
        <div class="center">
          <h5 class="red-text darken-4"> <?= exibeMensagens() ?> </h5>
        </div>
      </div>
      <div class="center">
        <img width="300" id="blah2" />
      </div>
      <div class="file-field input-field">
        <div class="btn userIcon white">
          <span><i class="material-icons black-text">account_circle</i></span>
          <input id="ImagemCadastro" type="file" name="foto" onchange="readURL(this);">
        </div>
        <div class="file-path-wrapper">
          <label for="ImagemCadastro">Escolha uma foto de perfil</label><input class="file-path validate" type="text">
        </div>
      </div>

      <div class="row">
        <div class="input-field">
          <input id="nome" type="text" name="nome" required>
          <label class="white-text" for="nome">Nome</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input id="emailx" type="email" name="email" class="validate" autocomplete="off" required>
          <<<<<<< HEAD <label for="emailx">Email</label>
            =======
            <label class="white-text" for="emailx">Email</label>
            >>>>>>> b49da55 (fds)
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input id="senha" name="senha" type="password" class="validate" autocomplete="off">
          <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons white-text">visibility</span></span>
          <<<<<<< HEAD <label for="senha">Senha</label>
            =======
            <label class="white-text" for="senha">Senha</label>
            >>>>>>> b49da55 (fds)
        </div>
      </div>
      <div class="row">
        <div class="input-field">

          <input type="password" name="repetirsenha" id="repetirsenha" class="validate">
          <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons white-text">visibility</span></span>
          <<<<<<< HEAD <label for="repetirsenha" autocomplete="off">Confirme a senha</label>
            =======
            <label class="white-text" for="repetirsenha" autocomplete="off">Confirme a senha</label>
            >>>>>>> b49da55 (fds)
            <span class="helper-text" data-error="Senhas não conferem"></span>
        </div>
      </div>

      <div class="row">
        <div class="center">
          <button class="btn-floating waves-effect waves-light white" type="submit" name="action">
            <i class="material-icons black-text">check</i>

          </button>
        </div>
      </div>


    </form>
  </div>

</main>
<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah2').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imagemCadastro").change(function() {
    readURL(this);
  });
</script>
<script>
  $('#textarea1').val('New Text');
  M.textareaAutoResize($('#textarea1'));
</script>
<?php require "../interfaces/footer.php"; ?>