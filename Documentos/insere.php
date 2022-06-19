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
$imagem = $nome;

if($_FILES['arquivo']['error'] == 0){

$sql = "INSERT INTO `documentos`(`titulo`,`forma`,`formato`, `especie`, `genero`, `localizacao`,`imagem`) 
VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao', '$imagem')";

}else{
	$sql = "INSERT INTO `documentos`(`titulo`,`forma`,`formato`, `especie`, `genero`, `localizacao`,`imagem`) 
VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao', '')";

}
$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
	header("location:inseretopic.php");
}




?>
</body>
</html>