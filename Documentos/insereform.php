
  <title> Tela de Cadastro</title>
<style>
 .formInsere{
  color: black !important;
  background-color: rgba(255,255,255,0.8);
  border-radius: 10px;
  padding-left: 15px;
  padding-right: 15px;
  padding-top: 15px;
  padding-bottom: 15px;
 }#selectTopicos{
  color: black !important;
 }label{
  color: black !important;
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
<div class="container formInsere">
    <form action="insere.php" method="post" enctype="multipart/form-data">
      <div class="center">
        <a style = "color:red"> <?= exibeMensagens() ?></a>
      </div>
       <div class="row">
        <div class="input-field">
       <input id = "title" type="text" name="titulo" required> 
       <label for="title">Título</label>
        </div>
       </div>
        <div class="row">
        <div class="input-field">
      <select id = "selectTopicos" name="forma">
          <option value="Cópia">Cópia</option>
          <option value="Original">Original</option>
      </select>
        <label for="form">Forma</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field">
          <input id="formato" type="text" name = "formato">
          <label for="formato">Formato</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field">
           <input id = "esp" type="text" name="especie" required>
           <label for="esp">Espécie</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field"> 
          <input id = "gen" type="text" name="genero" required>
          <label for="gen">Gênero</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field"> 
          <input id = "ano" type="number" name="ano" min="1" required>
          <label for="ano">Ano do documento</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field">  
        <textarea type="text" class="materialize-textarea" name="localizacao" id = "locali" required></textarea>
        <label for="locali">Localização</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field">  
        <textarea type="text" class="materialize-textarea" name="plvChaves" id = "plvChaves" required></textarea>
        <label for="plvChaves">Palavras Chaves (Separar com espaço) </label>
        </div>
        </div>
      <div class="file-field input-field">
      <div class="btn white">
        <span><i class = "material-icons large black-text">attach_file</i> </span>
        <input name = "arquivo" type="file" accept=".jpg,.jpeg,.png">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" accept=".jpg,.jpeg,.png" type="text" placeholder="Insira uma imagem" >
      </div>
    </div>
  <div class="row">
    <div class="center">
    <button class="btn-floating waves-effect waves-light white" type="submit" name="action">
      <i class="material-icons black-text">check</i>
  </button>
  </div>
    </div>
  </div>
    </form>
  </main>
  <?php require_once "../interfaces/footer.php"; ?>

 