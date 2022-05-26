<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alterar</title>

<link rel="stylesheet" type="text/css" href="estiloaltera.css">	
</head>

<body>
 
<h1 class= "titulo"> Alterar </h1>

<div class="tudo">
<?php

    include "../conecta.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM documentos WHERE id=$id";
    $resultado = mysqli_query($conexao,$sql);
    $documento = mysqli_fetch_array($resultado);
    
    mysqli_close($conexao);

    
function puxartopicos(){
  
  include "../conecta.php";

  $sql = "SELECT `id`, `titulo` FROM `topicos`";
  $resultado = mysqli_query($conexao, $sql);
  
  $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
  
  
  foreach($topicos as $chave => $topico){
      $titulo = $topico['titulo'];
      $id = $topico['id'];
  
      echo "<option value = $id> $titulo </option>";
  }
}
  
?>

<form action="altera.php" method="post" enctype="multipart/form-data">
    
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
  echo "<option value = $documentos[forma]> $documento[forma]</option>";
  echo "<option value = Original> Original </option>";
}else{
  echo "<option value = $documentos[forma]>$documento[forma]</option>";
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

<input type="text" name="localizacao" value=" <?= $documento['localizacao'];?>">

</p>

<p> Nivel Didático 1:
    
<select name="topico1">
             <?php
           puxartopicos();    
            ?>
</select>

        </p>


<p>Nivel Didático 2:

<select name="topico2">
             <?php
           puxartopicos();    
            ?>
</select>

        </p>


</p>
<p>Nível Didático 3: 

<select name="topico3">    <?php puxartopicos(); ?> </select>

        </p>

<p>Nível Didático 4: 

<select name="topico4"> <?php puxartopicos();     ?></select>

        </p>
<p>Nível Didático 5: 

<select name="topico5"> <?php puxartopicos(); ?>
</select>

        </p>

        <p><input name = "arquivo" type = "file"></p>
<input type="submit" value="Confirmar Alteração" class="button"> 
</form>

<br>

<a href="../Inicio/index.php" class="voltar">Cancelar</a class="voltar">
</div>


</body>
</html>