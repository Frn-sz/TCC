<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alterar</title>

<link rel="stylesheet" type="text/css" href="estiloalterat.css">	
</head>

<body>
 
<h1 class= "titulo"> Alterar Tópico </h1>

<?php

    include "../conecta.php";

    $id = $_GET['id'];

    $sq = "SELECT * FROM topicos WHERE id=$id";

    $resultado = mysqli_query($conexao,$sq);

    $listatopicos = mysqli_fetch_array($resultado, MYSQLI_BOTH);
    
    mysqli_close($conexao);
?>

<form action="alterat.php" method="post" id="alteracao">
    
<input type="hidden" name="id" value="

<?= $listatopicos['id'];?>">

<p>Tópico:

<input type="text" name="topico" value="

<?= $listatopicos['topicos'];?>">

</p>



<i> <input type="submit" value="Confirmar Alteração" class="button"> </i>
</form>

<br>
<a href="topicos.php" class="button1"> Listar Tópicos</a class="button1">
<br><br>
<a href="index.php" class="voltar">Voltar para o inicio</a class="voltar">
</div>


</body>
</html>