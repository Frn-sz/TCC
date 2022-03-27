<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">


<title>Lista de Documentos</title>
	
<script>

//Função que faz um pop-up na tela pra confirmar a exclusão de um documento.
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

require_once "conecta.php";

echo '<center> <table id = "biblioteca" class = "tabela">';

echo "<tr> <th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <br>";

//Realizando o comando select para puxar os documentos do Banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie` FROM `biblioteca`";

$resultado = mysqli_query($conexao, $sql);

//Criando o array com todos os documentos

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