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
<h1> Lista de Tópicos </h1>

</head>

 <body>



<?php

include_once "conecta.php";


echo "Tópicos cadastrados:";

$sql = "SELECT * FROM `topicos`";
$resultado = mysqli_query($conexao, $sql);

while($linha = mysqli_fetch_assoc($resultado)){

  $id = $linha['id'];
  $topicos = $linha['topicos'];
  
echo   "<p>" . $topicos . "</p>";



}


?>


<a id="bot" href="inseretopicos.html" class = "button"><br><br><br> Adicionar Tópico </a>

<input type="hidden" name="id" value="

<?php echo $linha['id'];?>">
</center>

</body>                       
</html>