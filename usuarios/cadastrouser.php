<title>Cadastro de Usuário</title>
<style>
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

  .userIcon {

    border-radius: 100% !important;
  }

  #blah2 {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin: auto;
    display: none;
    align-items: center;
  }

  .excluirImg {
    display: none;
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
        <div class="btn userIcon white">
          <input id="ImagemCadastro" type="file" name="foto" onchange="readURL(this);">
          <i class="material-icons black-text">account_circle</i></span>

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



<?php require "../interfaces/footer.php"; ?>

<script>
  let senha = document.getElementById('senha');
  let senhaC = document.getElementById('repetirsenha');

  function validarSenha() {
    if (senha.value != senhaC.value) {
      senhaC.setCustomValidity(" ");
      senhaC.reportValidity();
      return false;
      senhaC.addEventListener('input', validarSenha);
      senha.addEventListener('blur', validarSenha);
    } else {
      senhaC.setCustomValidity("");
      return true;

    }

  }
  // verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
  senhaC.addEventListener('input', validarSenha);
  senha.addEventListener('blur', validarSenha);
</script>

<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah2').attr('src', e.target.result);
      }
      document.querySelector('#blah2').style.display = "flex"

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imagemCadastro").change(function() {
    readURL(this);

  });
</script>