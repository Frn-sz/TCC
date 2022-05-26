<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">


<title>Lista de Tópicos</title>
	
<script>
function confirmacao(id) {
     var resposta = confirm("Deseja remover este tópico?");
     if (resposta == true) {
          window.location.href = "excluirt.php?id="+id;
     }
}

</script>
<h1> Lista de Tópicos </h1>

</head>

 <body>



<?php

include_once "../conecta.php";



$sql = "SELECT * FROM `topicos`";
$result = mysqli_query($conexao, $sql);

echo '<table id = "topicos" class = "tabela" border = "1">';

echo "<tr> <th> ID </th> <th> Título </th> <th colspan = 4> Operações</th> </tr> <br>";

$topicos = mysqli_fetch_all($result, MYSQLI_BOTH);

foreach($topicos as $chave => $topico){

     echo "<tr>";
     
     echo "<td>" . $topico['id']."</td  >";
     echo "<td>" . $topico['titulo'] ."</td>";
     
     
     echo "<td class ='alterar'> <a href= 'formalterat.php?id=$topico[id]'> Editar </a>";
     echo "<td class ='excluir'> <a href='#'" . "onclick='confirmacao($topico[id])'>" . "Excluir </a>" ;

     echo "</tr>";

}

echo "</table>";



echo "<a href='inicio.html' class ='voltar'>";
?>


<a id="bot" href="inseretopicos.html" class = "button"><br><br><br> Adicionar Tópico </a>

<input type="hidden" name="id" value="

<?php echo $linha['id'];?>">
</body>                       
</html>