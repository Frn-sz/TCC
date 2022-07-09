<title>Cadastro de Usuário</title>


<?php include "../conecta.php"; 
      include "../interfaces/header.php";
      include "../funcoes.php";

?>



<body>
    <main>
    <div class="row container">
        
    <form action = "cadastro_usuario.php" method = "post" enctype = "multipart/form-data" class="col s12">
   
    <div class="row">
      <div class="col s6">
        <h5 clas = "red darken-4"> <?= exibeMensagens() ?> </h5>
      </div>
    </div>
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


