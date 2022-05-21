<html>
<head>
 <meta charset="UTF-8">
		
</head>
 <body>

<?php

if(isset($_FILES['arquivo'])){

	$ext = strrchr($_FILES['arquivo']['name'], '.');
	$nome = md5(time()).$ext;
	$dir = "../upload/";

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$nome);

}
include_once "../conecta.php";

$titulo = $_POST['titulo'];
$forma = $_POST['forma'];
$formato = $_POST['formato'];
$especie = $_POST['especie'];
$genero = $_POST['genero'];
$localizacao = $_POST['localizacao'];
$topico1 = $_POST['topico1'];
$topico2 = $_POST['topico2'];
$topico3 = $_POST['topico3'];
$topico4 = $_POST['topico4'];
$topico5 = $_POST['topico5'];
$imagem = $nome;

$sql = "INSERT INTO `documentos`(`titulo`,`forma`,`formato`, `especie`, `genero`, `localizacao`, `topico1`, `topico2`,`topico3`, `topico4`, `topico5`,`imagem`) 
VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao','$topico1','$topico2','$topico3','$topico4', '$topico5', '$imagem')";

$resultado = mysqli_query($conexao,$sql);
mysqli_close($conexao);

if ($resultado)
{
	header("Location:../Inicio/index.php");
}
?>
</body>
</html>