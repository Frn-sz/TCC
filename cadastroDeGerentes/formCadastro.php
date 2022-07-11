<title>Cadastro de Gerente</title>


<?php 

      include "../conecta.php"; 
      include "../interfaces/header.php";
      include "../funcoes.php";

?>

    <main>
    <div class="row container">
        
    <form action = "cadastroGerente.php" method = "post" enctype = "multipart/form-data" class="col s12">
  
    <div class="row">
      <div class="center">
        <h5 class = "red-text darken-4"> <?= exibeMensagens() ?> </h5>
      </div>
    </div>
    <div class="center">
<img  width = "300" id = "blah2"/>
</div>
    <div class="file-field input-field">
      <div class="btn grey darken-2">
        <span><i class = "material-icons">add_a_photo</i></span>
        <input id="ImagemCadastro" type="file" name="foto" onchange="readURL(this);">
      </div>
      <div class="file-path-wrapper">
        <label for = "ImagemCadastro">Escolha uma foto de perfil</label><input class="file-path validate" type="text">
      </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id = "nome" type = "text" name = "nome" required>
          <label for="nome">Nome</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id = "emailx" type = "email" name = "email" class = "validate" required>
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
      <div class="row">
        <div class="input-field col s12">
       
          <input type = "password" name = "repetirsenha" id = "repetirsenha" class = "validate">
          <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
          <label for = "repetirsenha">Confirme a senha</label>
          <span class="helper-text" data-error="Senhas não conferem" ></span>
        </div>
      </div>

      <div class="row">
        <div class="col offset-s6">
      <button class="btn-floating waves-effect waves-light grey darken-2" type="submit" name="action">
    <i class="material-icons right">check</i>

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

    reader.onload = function (e) {
        $('#blah2').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}

$("#imagemCadastro").change(function(){
readURL(this);
});
</script>
<script>
    $('#textarea1').val('New Text');
  M.textareaAutoResize($('#textarea1'));
        
</script>
<?php require "../interfaces/footer.php"; ?>




