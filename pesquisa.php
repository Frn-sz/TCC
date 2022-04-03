<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/index.css">

<title>Resultado da Pesquisa</title>


<h1> <center> Resultado da pesquisa <center></h1>

</head>

 <body>


<?php

if(!isset($_GET['busca'])){
    header("location:inicio.html");
}
$pesquisa = "%". trim($_GET['busca']) . "%";

require_once "conecta.php";

echo '<table id = "biblioteca" class = "tabela" border = 1>';

echo "<tr> <th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <br>";

//Realizando o comando select para puxar os documentos do Banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie` FROM `biblioteca` WHERE `id` LIKE '$pesquisa' 
OR `titulo` LIKE '$pesquisa' 
OR `forma` LIKE '$pesquisa' 
OR `formato` LIKE '$pesquisa'
OR `especie` LIKE '$pesquisa'
OR `genero`LIKE '$pesquisa'
OR `locali`LIKE '$pesquisa'
OR `nv1` LIKE '$pesquisa'
OR `nv2` LIKE '$pesquisa'
OR `nv3` LIKE '$pesquisa'
OR `nv4` LIKE '$pesquisa'
OR `nv5` LIKE '$pesquisa';";
$resultado = mysqli_query($conexao, $sql);

while($documentos = mysqli_fetch_array($resultado, MYSQLI_BOTH)){

     echo "<tr>";
     
     echo "<td>" . $documentos['titulo']. "</td>";
     echo "<td>" . $documentos['forma'] . "</td>";
     echo "<td>" . $documentos['formato'] . "</td>";
     echo "<td>" . $documentos['especie'] . "</td>";
   
   
     echo "<td class ='vermais'> <a href = 'vermais.php?id=$documentos[id]'> Ver mais </a>";
     echo "<td class ='alterar'> <a href= 'formaltera.php?id=$documentos[id]'> Editar </a>";
     echo "<td class ='excluir'> <a href='#'" . "onclick='confirmacao($documentos[id])'>" . "Excluir </a>" ;
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}
     echo "</table>";

?>



<input type="hidden" name="id" value="

<?php echo $documentos['id'];?>">

<a href="inicio.html">Voltar para o inicio</a>
         
</body>     
</html>