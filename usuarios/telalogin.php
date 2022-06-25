<title>Tela de Login</title>




<body>
    <main>
    <?php 
      include "../interfaces/header.php";
?>
    <div class="row container">
        
    <form action = "login.php" method = "post" enctype = "multipart/form-data" class="col s12">
   

      <div class="row">
        <div class="input-field col s12">
          <input id = "email" type = "email" name = "email" class = "validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id = "senha" name = "senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>
  
      <button style = "margin-left:50%;" class="btn-floating waves-effect waves-light blue darken-4" type="submit" name="action">
    <i class="material-icons right">check</i>
  </button>
    </form>
  </div>

    </main>
</body>


<?php require "../interfaces/footer.php"; ?>
