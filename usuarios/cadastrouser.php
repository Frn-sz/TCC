<title>Cadastro de Usuário</title>
<style>
  input {
    color: black;
  }

  label {
    color: black !important;
  }

  .formCadastro {
    background-color: rgba(255, 255, 255, 0.9);
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 10px;
  }
</style>

<?php include "../conecta.php";
include "../interfaces/header.php";
include "../funcoes.php";

?>

<main>


  <br><br><br>
  <div class="row container formCadastro">
    <form action="cadastro_usuario.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="center">
          <h5 class="red-text darken-4"> <?= exibeMensagens() ?> </h5>
        </div>
      </div>
      <div class="center">
        <img width="300" id="blah2" />
      </div>
      <div class="file-field input-field">
        <div class="btn black">
          <span><i class="material-icons">add_a_photo</i></span>
          <input id="ImagemCadastro" type="file" name="foto" onchange="readURL(this);">
        </div>
        <div class="file-path-wrapper">
          <label for="ImagemCadastro">Escolha uma foto de perfil</label><input class="file-path validate" type="text">
        </div>
      </div>

      <div class="row">
        <div class="input-field ">
          <input id="nome" type="text" name="nome" required>
          <label for="nome">Nome</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field ">
          <input id="emailx" type="email" name="email" class="validate" required>
          <label for="emailx">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field ">
          <input id="senha" name="senha" type="password" class="validate">
          <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for="senha">Senha</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">

          <input type="password" name="repetirsenha" id="repetirsenha" class="validate">
          <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for="repetirsenha">Confirme a senha</label>
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