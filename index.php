<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/index.css">
<link rel = "stylesheet" href="css/materialize.css">
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


</head>

 <body>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!--Materialize-->
 <script src="js/materialize.js"></script>


<!-- Fazendo o titulo da página -->

     
<div class = "card valign-wrapper"> 
     <div class = "card-content valign center-block">
          <div class = "row">
               <h1 class = "center-align black-text"> Lista de Documentos </h1>
                    
                    </div>
               </div>
          </div>
</div>


<div class = "container">
     <div class = "row">

 <a class = "col s2 offset-s1 waves-effect waves-light btn offset-s1.5 " id='bot' href='insereform.php'> Adicionar Documento </a>


<a  class = "col s2 waves-effect waves-light btn offset-s2" href='topicos.php'> Lista de Tópicos </a>
    

<!--Passando o ID no modo hidden-->

<input type="hidden" name="id" value="<?=$documentos['id'];?>">

<a class = "col s2 waves-effect waves-light btn offset-s2" href="inicio.html">Voltar para o inicio</a>

     </div>
</div>

<?php

require_once "conecta.php";


echo '<table id = "biblioteca" class = "highlight " border = 2>';

echo "<tr> <th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 5> Operações </th> </tr> <br>";

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
   
   
     echo "<td class ='waves-effect waves-teal btn-flat'> <a href = 'vermais.php?id=$documentos[id]'> Ver mais </a>";
     echo "<td class ='waves-effect waves-teal btn-flat'> <a href= 'formaltera.php?id=$documentos[id]'> Editar </a>";
     echo "<td class ='waves-effect waves-teal btn-flat'> <a href='#'" . "onclick='confirmacao($documentos[id])'>" . "Excluir </a>" ;
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}
     echo "</table>";

     
?>



</body>             

</html>