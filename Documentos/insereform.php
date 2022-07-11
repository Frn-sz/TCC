
  <title> Tela de Cadastro</title>
<style>
  #x{
    text-align: center;
  }
</style>
</head>

<body>
  <?php

include('../funcoes.php');

verificandoNivelUsuario();
 
  ?>
  <main>


    <?php require_once "../interfaces/header.php"; ?>
<br><br>
    <form class = "container" action="insere.php" method="post" enctype="multipart/form-data">
   
        
       <div class="row">
        <div class="input-field">
       <input id = "title" type="text" name="titulo" required> 
       <label for="title">Título</label>
        </div>
        <div class="row">
        <div class="input-field">
      <select id = "form" name="forma">

          <option value="Cópia">Cópia</option>
          <option value="Original">Original</option>

        </select>
        <label for="form">Forma</label>
        </div>
        <div class="row">
        <div class="input-field">
          <input id="formato" type="text" name = "formato">
          <label for="formato">Formato</label>
        </div>
        <div class="row">
        <div class="input-field">
           <input id = "esp" type="text" name="especie" required>
           <label for="esp">Espécie</label>
        </div>
        <div class="row">
        <div class="input-field"> 
          <input id = "gen" type="text" name="genero" required>
          <label for="gen">Gênero</label>
        </div>
        <div class="row">
        <div class="input-field">  
        <textarea type="text" class="materialize-textarea" name="localizacao" id = "locali" required></textarea>
        <label for="locali">Localização</label>
        </div>
   

      <div class="file-field input-field">
      <div class="btn grey darken-2">
        <span><i class = "material-icons large">attach_file</i> </span>
        <input name = "arquivo" type="file" accept=".jpg,.jpeg,.png">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" accept=".jpg,.jpeg,.png" type="text" placeholder="Insira uma imagem" >
      </div>
    </div>
  <div class="row">
    <div class="col offset-s6">
    <button id = "x" style = 'border-radius:10px;'class="btn waves-effect waves-light grey darken-2" type="submit" name="action">
      <i class="material-icons">check</i>
  </button>

    </div>
  </div>
   

    </form>

  </main>
  <br>
  <?php require_once "../interfaces/footer.php"; ?>

 