<title>Favoritos</title>


<main>

<?php 
include('puxandofavoritos.php');
include ('../interfaces/header.php');
?>

<div class = 'container'><div class='row'>
  <?php 
  if($documentos != false){
    foreach($documentos as $chave => $documento){

  ?>
   
     <div class='col s2 m3'>
       <div class='card'>
         <div class='card-image'>


         <?php if($documento['imagem'] != ""){   ?>
      <img class='materialboxed' src ='../upload/<?=$documento['imagem']?>'>";
         <?php }else{ ?>
       <div class='center'>
          Sem imagem
          </div>
         <?php } ?>

        
         </div>
         <div class='card-content'>
         <span class='card-title'><?= $documento['titulo']?></span>
           <p> Forma:<?=  $documento['forma'] ?><br></p>
           <p> Formato:<?=  $documento['formato'] ?><br></p>
           <p> Espécie: <?= $documento['especie']?> </p>
         </div>
         <div class='card-action center'>

         <a href = '../Documentos/vermais.php?id=$documento[id]' class = 'btn-floating waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>
     <a href = 'removerfavorito.php?id=$documento[id]' class = 'btn waves effect wavves-light blue darken-4'>Remover favorito</a> 
        </div>
       </div>
     </div>


         <?php }}else?>
         Não há nenhum favorita ná sua lista. 

</main>



<?php include('../interfaces/footer.php'); ?>
