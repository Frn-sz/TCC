
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
     #inserir{
     margin-left: 50%;
  }

  </style>



 <body>
<main>

<?php
require_once "../interfaces/header.php";
require_once "../conecta.php";
?>
<br>


<div class = "container">
<div><a id = "inserir" class = 'waves-effect btn-floating blue darken-4' href = '../Documentos/insereform.php'><i class = "material-icons">add</i> </a></div>
</div>
<?php
echo '<table id = "documentos" class = "container " border = 2>';

echo "<tr><thead>  <th> Imagem </th><th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <thead> <tdbody><br>";

//Realizando o comando select para puxar os documentos do Banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie`, `imagem`FROM `documentos`";

$resultado = mysqli_query($conexao, $sql);

//Criando o array com todos os documentos
?>

<?php


$documentos = mysqli_fetch_all($resultado, MYSQLI_BOTH);


     foreach($documentos as $chave => $documento){
     echo "<tr>";
     if($documento['imagem'] != ""){ 
          
     echo "<td> <img width = 250 src = ../upload/" . $documento['imagem'] . "></td>";

}    else{
     
     echo "<td>Sem Imagem</td>";

}
     echo "<td>" . $documento['titulo']. "</td>";
     echo "<td>" . $documento['forma'] . "</td>";
     echo "<td>" . $documento['formato'] . "</td>";
     echo "<td>" . $documento['especie'] . "</td>";
     
   
   
     echo "<td class =''> <a href = '../Documentos/vermais.php?id=$documento[id]' class = 'btn-floating waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>";
     echo "<td class =''> <a href= '../Documentos/formaltera.php?id=$documento[id]' class = 'btn-floating waves-effect waves-light  blue darken-4'> <i class ='material-icons'>edit</i>  </a>";
     echo "<td class =''> <a href='#'" . "onclick='confirmacao($documento[id])' class = 'btn-floating waves-effect waves-light blue darken-4'>  <i class = 'material-icons'>" . "delete </i> </a>" ;
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}

     echo "<tdbody> </table>";
     ?>
    </div>





</main>
<?php include_once "../interfaces/footer.php";?>
</body>             

</html>