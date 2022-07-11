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


<main>

<?php
require_once "../interfaces/header.php";?>
<br>
<?php
require_once "../conecta.php";

if(isset($_SESSION['id_usuario'])){
     if($_SESSION['nvl_usuario'] == 1 OR $_SESSION['nvl_usuario'] == 3){
?>

     


<div><a id = "inserir" class = 'waves-effect btn-floating grey darken-2' href = '../Documentos/insereform.php'><i class = "material-icons">add</i> </a></div>
<br>

<?php

}}
//Realizando o comando select para puxar os documentos do Banco de dados

$sql = "SELECT `id`, `titulo`, `forma`, `formato`, `especie`, `imagem`FROM `documentos`";

$resultado = mysqli_query($conexao, $sql);



$documentos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
?>

<div class = 'container' ><div class='row'>

<?php  foreach($documentos as $chave => $documento){ ?>


     <div class='col s2 m4'>
       <div class='card hoverable'>
         <div class='card-image cardindex'>

<?php if($documento['imagem'] != ""){  ?>

          <img class='materialboxed imagem' src ='../upload/<?= $documento['imagem'] ?>'>
         <?php }else{ ?>
          <div class='center'>
           "Sem imagem"
          </div>
         <?php } ?>

         
         </div>
         <div class='card-content'>
         <span class='card-title'><?= $documento['titulo'] ?></span>
           <p> Forma:<?=  $documento['forma'] ?> <br></p>
           <p> Formato:<?=  $documento['formato'] ?> <br></p>
           <p> Espécie:<?=  $documento['especie']  ?></p>
         </div>
         <div class='card-action center'>

          <?php if(!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2){ ?>
               
          <a href = '../Documentos/vermais.php?id=<?=$documento['id']?>'  class = 'btn-large waves-effect waves-light grey darken-2 '><i class ='material-icons'>search</i>  </a>
          
          <?php }else{ ?>

          <a href = '../Documentos/vermais.php?id=<?=$documento['id']?>' class = 'btn-floating waves-effect waves-light  grey darken-2 '><i class ='material-icons'>search</i>  </a>

          <?php } ?>

          <?php if(isset($_SESSION['nvl_usuario'])){ 
         
         if($_SESSION['nvl_usuario'] != 2){ ?>
          <a href= '../Documentos/formaltera.php?id=<?= $documento['id'] ?>' class = 'btn-floating waves-effect waves-light  grey darken-2'> <i class ='material-icons'>edit</i>  </a>
         <a href='#' onclick="confirmacao(<?=$documento['id']?>)" class = 'btn-floating waves-effect waves-light grey darken-2'>  <i class = 'material-icons'> delete </i> </a>
       <?php }} ?>
          
        </div>
       </div>
     </div>


 <?php    } ?>
</div></div>

</main>

<?php include_once "../interfaces/footer.php";?>

</html>