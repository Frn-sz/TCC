<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">


<title>Lista de Documentos</title>
	
<script>
function confirmacao(id) {
     var resposta = confirm("Deseja remover este documento?");
     if (resposta == true) {
          window.location.href = "excluir.php?id="+id;
     }
}

</script>
<h1> <center> Lista de Documentos <cente></h1>

</head>

 <body>



<?php

include_once "conecta.php";

echo '<center> <table id = "biblioteca" class = "tabela">';

echo "<tr> <th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <br>";

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie` FROM `biblioteca`";
$resultado = mysqli_query($conexao, $sql);




while($linha = mysqli_fetch_assoc($resultado)){

  $id = $linha['id'];
  $titulo = $linha['titulo'];
  $forma = $linha['forma'];
  $formato = $linha['formato'];
  $especie = $linha['especie'];
  

  echo "<tr>";
  echo "<td>" . $titulo. "</td>";
  echo "<td>" . $forma . "</td>";
  echo "<td>" . $formato . "</td>";
  echo "<td>" . $especie . "</td>";


  echo "<td class ='vermais'> <a href = 'vermais.php?id=$id'> Ver mais </a>";
  echo "<td class ='alterar'> <a href= 'formaltera.php?id=$id'> Editar </a>";
  echo "<td class ='excluir'> <a href='#'" . "onclick='confirmacao($id)'>" . "Excluir </a>" ;
  echo "<a href='inicio.html' class ='voltar'>";

  echo "</tr>";


}

echo "</table>";


?>

<br>
<a id="bot" href="inserex.php" class = "button"> Adicionar Documento </a>
<br>
<br>

<a href="topicos.php"> Lista de Tópicos </a>
<input type="hidden" name="id" value="

<?php echo $linha['id'];?>">
</center>

</body>                       
</html>