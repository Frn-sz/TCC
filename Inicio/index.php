<?php

if(!isset($_SESSION)){
     session_start();
}
?>
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

if(isset($_SESSION['id_usuario'])){
     if($_SESSION['nvl_usuario'] == 1){
?>
<br>
     


<div><a id = "inserir" class = 'waves-effect btn-floating blue darken-4' href = '../Documentos/insereform.php'><i class = "material-icons">add</i> </a></div>

<?php

}}
//Realizando o comando select para puxar os documentos do Banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie`, `imagem`FROM `documentos`";

$resultado = mysqli_query($conexao, $sql);

//Criando o array com todos os documentos
?>


<?php


$documentos = mysqli_fetch_all($resultado, MYSQLI_BOTH);

echo "<div class = 'container'><div class='row'>";
foreach($documentos as $chave => $documento){

     echo "
     <div class='col s2 m3'>
       <div class='card'>
         <div class='card-image'>";


         if($documento['imagem'] != ""){  
          echo "<img class='materialboxed' src ='../upload/$documento[imagem]'>";
         }else{
          echo "<div class='center'>";
          echo "Sem imagem";
          echo "</div>";
         }

         echo "
         </div>
         <div class='card-content'>
         <span class='card-title'>$documento[titulo]</span>
           <p> Forma: $documento[forma] <br></p>
           <p> Formato: $documento[formato] <br></p>
           <p> Espécie: $documento[especie] </p>
         </div>
         <div class='card-action center'>

         <a href = '../Documentos/vermais.php?id=$documento[id]' class = 'btn-floating waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>";
         if(isset($_SESSION['nvl_usuario'])){
         if($_SESSION['nvl_usuario'] == 1){
        echo "<a href= '../Documentos/formaltera.php?id=$documento[id]' class = 'btn-floating waves-effect waves-light  blue darken-4'> <i class ='material-icons'>edit</i>  </a>
         <a href='#'" . "onclick='confirmacao($documento[id])' class = 'btn-floating waves-effect waves-light blue darken-4'>  <i class = 'material-icons'>" . "delete </i> </a>";
         }}
        echo "</div>
       </div>
     </div>";


}
echo "</div></div>";

     ?>
  





</main>
<?php include_once "../interfaces/footer.php";?>
</body>             

</html>