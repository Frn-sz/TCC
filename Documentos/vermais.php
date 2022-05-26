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

$sql = "SELECT * FROM documentos WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);

$documentos = mysqli_fetch_assoc($resultado);

$id = $documentos['id'];
$titulo = $documentos['titulo'];
$forma = $documentos['forma'];
$formato = $documentos['formato'];
$especie = $documentos['especie'];
$genero = $documentos['genero'];
$locali = $documentos['localizacao'];
$topico1 = $documentos['topico1'];
$topico2 = $documentos['topico2'];
$topico3 = $documentos['topico3'];
$topico4 = $documentos['topico4'];
$topico5 = $documentos['topico5'];
$imagem = $documentos['imagem'];

$sql = "SELECT * FROM `topicos` WHERE `id`='$topico1' or `id` = '$topico2' or `id`='$topico3' or `id`='$topico4'  or `id`='$topico5'";
$result = mysqli_query($conexao,$sql);



$topicos = mysqli_fetch_all($result, MYSQLI_BOTH);


echo  "<h1>" . $titulo ."</h1><br><br>";
echo "<i>Forma:</i> " . $forma . "<br><br>";
echo "<i>Formato: </i>" . $formato . "<br><br>";
echo "<i>Espécie: </i> " . $especie . "<br><br>";
echo "<i>Localização: </i>" . $locali . "<br><br>";
echo "<i>Gênero :</i> " . $genero . "<br><br>";
$i = 1;
foreach($topicos as $chave => $topico){
    $id = $topico['id'];
   
echo "<i> Tópico $i: </i> " . $topico['titulo'] . "<br><br>";
if($topico2 != "" and $topico2 != $topico1){
$i++;
echo "<i>Tópico $i: </i>" . $topico['titulo'] . "<br><br>";
}if($topico3 != "" and $topico3 != $topico2 and $topico3 != $topico1){

$i++;
echo "<i>Tópico $i: </i> " . $topico['titulo'] . "<br><br>";

}if($topico4 != "" and $topico4 != $topico3 and $topico4 != $topico2 and $topico4 != $topico1){
    $i++;
echo "<i>Tópico $i: </i>" . $topico['titulo'] . "<br><br>";

}if($topico5 != "" and $topico5 != $topico4 and $topico5 != $topico3 and $topico5 != $topico2 and $topico5 != $topico1){
    $i++;
echo "<i>Tópico $i:</i>" . $topico['titulo'] . "<br><br>";

}
}

mysqli_close($conexao);

echo "<img class = 'right col s2' width = 400 src = '../upload/$imagem' ";
?>

</div>
<a href='../Inicio/index.php' class="voltar"> Voltar </a>


</body>
</html>