
<title>Alterar</title>

<link rel="stylesheet" type="text/css" href="estiloaltera.css">	
</head>


<?php

    include "../conecta.php";
    include('../funcoes.php');
    verificandoNivelUsuario();
    $id = $_GET['id'];
    $sql = "SELECT * FROM documentos WHERE id=$id";
    $resultado = mysqli_query($conexao,$sql);
    $documento = mysqli_fetch_array($resultado);
    
    mysqli_close($conexao);

  
?>
 <?php require_once "../interfaces/header.php"; ?>


<form class = "container" action="altera1.php" method="post" enctype="multipart/form-data">
    
<input type="hidden" name="id" value="

<?php echo $documento['id'];?>">

<p>Titulo:

<input type="text" name="titulo" value="

<?php echo $documento['titulo'];?>">

</p>
<p>Forma:

<select name = "forma" value = 
  <?php
if($documento['forma'] == "Cópia"){ 
  echo "<option value = Cópia> Cópia </option>";
  echo "<option value = Original> Original </option>";
}else{
  echo "<option value = Original >Original</option>";
  echo "<option value = Cópia> Original </option>";
}
?>>
</select>
</p>

<p> Formato:

<input type="text" name="formato" value="

<?php echo $documento['formato'];?>">
</p>

<p>Espécie:

<input type="text" name="especie" value="

<?php echo $documento['especie'];?>">

</p>
<p>Gênero:

<input type="text" name="genero" value="

<?php echo $documento['genero'];?>">

</p>


<p>Localização:<br><br>

<textarea type="text" class="materialize-textarea" name="localizacao"><?= $documento['localizacao'];?></textarea>

</p>


      <p> Tópico 1: <select name="0"> <?php puxartopicos() ?> </select> </p>
      <p> Tópico 2: <select name="1"> <?php puxartopicos() ?> </select></p>
      <p> Tópico 3: <select name="2"> <?php puxartopicos() ?> </select></p>
      <p> Tópico 4: <select name="3"> <?php puxartopicos() ?> </select></p>
      <p> Tópico 5: <select name="4"> <?php puxartopicos() ?> </select></p>
  

<div class="file-field input-field">
      <div class="btn blue darken-4">
        <span><i class = "material-icons large">attach_file</i> </span>
        <input name = "arquivo" type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Insira uma imagem">
      </div>
    </div>
    <div class="row">
  <div class="col offset-s6">
    <button id = "y" style = 'border-radius:10px;' class = "btn waves-effect waves-light blue darken-4" type = "reset">
    <i class = "material-icons">cancel</i>
  </button>
    <button id = "x" style = 'border-radius:10px;'class="btn waves-effect waves-light blue darken-4" type="submit" name="action">
      <i class="material-icons">check</i>
  </button>
  </div>
  </div>
    
</form>


<br>



</main>
<?php require_once "../interfaces/footer.php"; ?>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>