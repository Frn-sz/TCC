<title>Cadastro de Usuário</title>


<?php include "../conecta.php"; 
      include "../interfaces/header.php";
?>


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
    <div class="row container">
        
    <form action = "cadastro_usuario.php" method = "post" enctype = "multipart/form-data" class="col s12">
   
    <div class="file-field input-field">
      <div class="btn blue darken-4">
        <span><i class = "material-icons">add_a_photo</i></span>
        <input type="file" name="foto">
      </div>
      <div class="file-path-wrapper">
        <label for = "K">Escolha uma foto de perfil</label><input id = "k" class="file-path validate" type="text">
      </div>
    </div>
  
    <div class="row">
        <div class="input-field col s12">
          <input id = "nome" type = "text" name = "nome">
          <label for="nome">Nome</label>
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
      <div class="row">
        <div class="input-field col s12">
       
          <input type = "password" name = "repetirsenha" id = "repetirsenha" class = "validate">
          <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for = "repetirsenha">Confirme a senha</label>
        </div>
      </div>
      <div class="row">
        <div class="col offset-s6">
      <button class="btn-floating waves-effect waves-light blue darken-4" type="submit" name="action">
    <i class="material-icons right">check</i>
  </button>
  </div>
  </div>
    </form>
  </div>

    </main>
</body>


<?php require "../interfaces/footer.php"; ?>


<script>

let senha = document.getElementById('senha');
let senhaC = document.getElementById('repetirsenha');

function validarSenha() {
  if (senha.value != senhaC.value) {
    senhaC.setCustomValidity("Senhas diferentes!");
    senhaC.reportValidity();
    return false;
  } else {
    senhaC.setCustomValidity("");
    return true;
  }
}

// verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais

senhaC.addEventListener('input', validarSenha);

</script>