<title>Favoritos</title>


<main>

<?php 
include('puxandofavoritos.php');
include ('../interfaces/header.php');

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
        echo "<a href = 'removerfavorito.php?id=$documento[id]' class = 'btn waves effect wavves-light blue darken-4'>Remover favorito</a>"; 
        echo "</div>
       </div>
     </div>";


}?>

</main>



<?php include('../interfaces/footer.php'); ?>
