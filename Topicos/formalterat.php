<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alterar</title>


</head>

<body>
 


<?php

    include "../conecta.php";
    require_once "../interfaces/header.php";

    $id = $_GET['id'];
 
    $sql = "SELECT * FROM topicos WHERE id='$id'";
    $resultado = mysqli_query($conexao,$sql);
    $topicos = mysqli_fetch_array($resultado, MYSQLI_BOTH);
    mysqli_close($conexao);
?>

<form action="alterat.php" method="post">
    <input type = "hidden" name ="id" value = "<?= $topicos['id'];?>">

<p>Título: <input type="text" name="titulo" value=" <?= $topicos['titulo'];?> "> </p>



<input type="submit" value="Confirmar Alteração" class="button">
</form>

<br>
<a href="topicos.php" class="button1"> Listar Tópicos</a class="button1">
<br><br>
<a href="index.php" class="voltar">Voltar para o inicio</a class="voltar">
</div>


</body>
</html>