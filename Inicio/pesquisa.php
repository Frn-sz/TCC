<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/materialize.css">

<title>Resultado da Pesquisa</title>


<h1> <center> Resultado da pesquisa <center></h1>

</head>

 <body>


<?php

if(!isset($_GET['busca'])){
    header("location:inicio.html");
}
$pesquisa = "%". trim($_GET['busca']) . "%";

require_once "../Corretor/Corretor.php";
require_once "../conecta.php";

echo '<table id = "documentos" class = "tabela" border = 1>';

echo "<tr> <th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <br>";

//Realizando o comando select para pesquisar no banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie` FROM `documentos` WHERE  
`titulo` LIKE '$pesquisa' 
OR `locali`LIKE '$pesquisa'
OR `topico1` LIKE '$pesquisa'
OR `topico2` LIKE '$pesquisa'
OR `topico3` LIKE '$pesquisa'
OR `topico4` LIKE '$pesquisa'
OR `topico5` LIKE '$pesquisa';";
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

<a href="inicio.php">Voltar para o inicio</a>
         
</body>     
</html>