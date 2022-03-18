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
    include "conecta.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM biblioteca WHERE id=$id";
    $resultado = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_array($resultado);
    
    mysqli_close($conexao);
?>

<form action="altera.php" method="post" id="alteracao">
    
<input type="hidden" name="id" value="

<?php echo $linha['id'];?>">

<p>Titulo:

<input type="text" name="titulo" value="

<?php echo $linha['titulo'];?>">

</p>
<p>Forma:

<input type="text" name="forma" value="

<?php echo $linha['forma'];?>">

</p>

<p> Formato:

<input type="text" name="formato" value="

<?php echo $linha['formato'];?>">
</p>

<p>Espécie:

<input type="text" name="especie" value="

<?php echo $linha['especie'];?>">

</p>
<p>Gênero:

<input type="text" name="genero" value="

<?php echo $linha['genero'];?>">

</p>


<p>Localização:<br><br>

<input type="text" name="locali" value="

<?php echo $linha['locali'];

?>">

</p>

<p> Nivel Didático 1:
    
<select name="nv1">
             <?php
            include "conecta.php"; 
            $sql = "SELECT `id`,`topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }           
            ?>
</select>

        </p>


<p>Nivel Didático 2:

<select name="nv2">
             <?php
            include "conecta.php"; 
            $sql = "SELECT `id`,`topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }           
            ?>
</select>

        </p>


</p>
<p>Nível Didático 3: 

<select name="nv3">
             <?php
            include "conecta.php"; 
            $sql = "SELECT `id`,`topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }           
            ?>
</select>

        </p>

<p>Nível Didático 4: 

<select name="nv4">
             <?php
            include "conecta.php"; 
            $sql = "SELECT `id`,`topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }           
            ?>
</select>

        </p>
<p>Nível Didático 5: 

<select name="nv5">
             <?php
            include "conecta.php"; 
            $sql = "SELECT `id`,`topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }           
            ?>
</select>

        </p>
<i> <input type="submit" value="Confirmar Alteração" class="button"> </i>
</form>

<br>
<a href="index.php" class="button1"> Listar Documentos</a class="button1">
<br><br>
<a href="index.php" class="voltar">Voltar</a class="voltar">
</div>


</body>
</html>