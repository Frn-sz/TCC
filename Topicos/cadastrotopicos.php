<html>
<head>
 <meta charset="UTF-8">
		
</head>
 <body>

<?php

include_once "../conecta.php";
$titulo = $_POST['titulo'];
$sql = "INSERT INTO `topicos`(`titulo`) VALUES ('$titulo')";
$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado)
{
	header("Location:topicos.php");
}
?>
</body>
</html>