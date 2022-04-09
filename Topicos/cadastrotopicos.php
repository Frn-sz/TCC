<html>
<head>
 <meta charset="UTF-8">
		
</head>
 <body>

<?php

include_once "../conecta.php";
$topico = $_GET['topicos'];
$sql = "INSERT INTO `topicos`(`topicos`) VALUES ('$topico')";
$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado)
{
	header("Location:topicos.php");
}
?>
</body>
</html>