<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel = "stylesheet" href="../css/materialize.css">
<title>Lista de Documentos</title>
	

<script>
//Função que faz um pop-up na tela pra confirmar a exclusão de um documento.
function confirmacao(id) {
     var resposta = confirm("Deseja remover este documento?");
     if (resposta == true) {
          window.location.href = "../Documentos/excluir.php?id="+id;
     }}
</script>

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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!--Materialize-->
 <script src="js/materialize.js"></script>

<!--Passando o ID no modo hidden-->


<input type="hidden" name="id" value="<?=$documentos['id'];?>">


<?php
require_once "../interfaces/header.php";
require_once "../conecta.php";
?>
<br>
<div class = "container">
<div class = "col s3 l" ><a class = 'waves-effect  btn blue darken-1' href = '../Documentos/insereform.php'> Inserir Documento </a></div>
</div>
<?php
echo '<table id = "documentos" class = "highlight " border = 2>';

echo "<tr><thead>  <th> Imagem </th><th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <thead> <tdbody><br>";

//Realizando o comando select para puxar os documentos do Banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie`, `imagem`FROM `documentos`";

$resultado = mysqli_query($conexao, $sql);

//Criando o array com todos os documentos

$documentos = mysqli_fetch_all($resultado, MYSQLI_BOTH);


     foreach($documentos as $chave => $documento){
     echo "<tr>";
     if(isset($documento['imagem'])){ echo "<td> <img width = 250 src = ../upload/" . $documento['imagem'] . "></td>";}
     echo "<td>" . $documento['titulo']. "</td>";
     echo "<td>" . $documento['forma'] . "</td>";
     echo "<td>" . $documento['formato'] . "</td>";
     echo "<td>" . $documento['especie'] . "</td>";
     
   
   
     echo "<td class =''> <a href = '../Documentos/vermais.php?id=$documento[id]'> Ver mais </a>";
     echo "<td class =''> <a href= '../Documentos/formaltera.php?id=$documento[id]'> Editar </a>";
     echo "<td class =''> <a href='#'" . "onclick='confirmacao($documento[id])'>" . "Excluir </a>" ;
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}

     echo "<tdbody> </table>";
    
?>




</main>
<?php include_once "../interfaces/footer.php";?>
</body>             

</html>