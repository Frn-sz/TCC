<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style type="text/css">
body{
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

  </style>

</head>
<body>
<main>
	
<?php
include "../conecta.php";
include_once "../interfaces/header.php";
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
$topicos = array($documentos['topico1'], $documentos['topico2'],$documentos['topico3'],$documentos['topico4'],$documentos['topico5']);
$imagem = $documentos['imagem'];


?>

<?php

$sql = "SELECT * FROM `topicos` WHERE `id`='$topicos[0]' or `id` = '$topicos[1]' or `id`='$topicos[2]' or `id`='$topicos[3]'  or `id`='$topicos[4]'";
$result = mysqli_query($conexao,$sql);



$topicos = mysqli_fetch_all($result, MYSQLI_BOTH);

//Fazendo Tabela de Informações do Documento 

echo "<table class = 'bordered'> <thead>  <th>Imagem</th> <th> Título </th> <th> Forma </th> <th>Formato</th> <th>Espécie</th> <th>Localização</th> <th>Gênero</th> </thead>";

echo "<tbody> <tr>  <td> <img width = 200 src= '../upload/$imagem'> </td>
<td> $titulo </td>";
echo "<td> $forma </td>";
echo "<td> $formato </td>";
echo "<td> $especie </td>";
echo "<td> $locali </td>";
echo "<td> $genero </td> </tr></tbody></table>";

$i = 0;

echo "<br><br><table class = 'highlight'> <thead>";
foreach($topicos as $chave => $topico){
   $i++;
   echo "<th> Tópico $i </th>";
}
echo "</thead><tbody><tr>";
foreach($topicos as $chave => $topico){
    echo "<td>". $topico['titulo']."</td>";
}
echo "</tr> </tbody> </table>";



mysqli_close($conexao);


?>

<br><br>



</main>
<br>
<?php include_once "../interfaces/footer.php"; ?>
</body>
</html>