<html>
<head>
 <meta charset="UTF-8">
		
</head>
 <body>

<?php
include_once "conecta.php";

$titulo = $_GET['titulo'];
$forma = $_GET['forma'];
$formato = $_GET['formato'];
$especie = $_GET['especie'];
$genero = $_GET['genero'];
$locali = $_GET['locali'];
$nv1 = $_GET['nv1'];
$nv2 = $_GET['nv2'];
$nv3 = $_GET['nv3'];
$nv4 = $_GET['nv4'];
$nv5 = $_GET['nv5'];


$sql = "INSERT INTO `biblioteca`(`titulo`,`forma`,`formato`, `especie`, `genero`, `locali`, `nv1`, `nv2`,`nv3`, `nv4`, `nv5`) 
VALUES ('$titulo','$forma','$formato','$especie','$genero ','$locali','$nv1','$nv2','$nv3','$nv4', '$nv5')";

$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado)
{
	header("Location:index.php");
}
?>
</body>
</html>