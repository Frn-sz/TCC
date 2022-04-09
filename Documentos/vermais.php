<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<link rel="stylesheet" type="text/css" href="estilovermais.css">	

<div class = "tabela">
<?php
include "../conecta.php";
$id = $_GET['id'];



$sql = "SELECT * FROM biblioteca WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);

$linha = mysqli_fetch_assoc($resultado);

$id = $linha['id'];
$titulo = $linha['titulo'];
$forma = $linha['forma'];
$formato = $linha['formato'];
$especie = $linha['especie'];
$genero = $linha['genero'];
$locali = $linha['locali'];
$nv1 = $linha['nv1'];
$nv2 = $linha['nv2'];
$nv3 = $linha['nv3'];
$nv4 = $linha['nv4'];
$nv5 = $linha['nv5'];



echo  "<h1>" . $titulo ."</h1><br><br>";
echo "<i>Forma:</i> " . $forma . "<br><br>";
echo "<i>Formato: </i>" . $formato . "<br><br>";
echo "<i>Espécie: </i> " . $especie . "<br><br>";
echo "<i>Localização: </i>" . $locali . "<br><br>";
echo "<i>Gênero :</i> " . $genero . "<br><br>";

echo "<i>Nível Didático 1: </i> " . $nv1 . "<br><br>";

if($nv2 != ""){

echo "<i>Nível Didático 2:</i>" . $nv2 . "<br><br>";

}else{}

if($nv3 != ""){
echo "<i>Nível Didático 3: </i> " . $nv3 . "<br><br>";

}else{}

if($nv4 != ""){
echo "<i>Nível Didático 4: </i>" . $nv4 . "<br><br>";

}else{}

if($nv5 != ""){
echo "<i>Nível Didático 5:</i>" . $nv5 . "<br><br>";

}else{}


mysqli_close($conexao);


?>
</div>
<a href='../Inicio/index.php' class="voltar"> Voltar </a>


</body>
</html>