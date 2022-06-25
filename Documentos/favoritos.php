<title>Favoritos</title>

<?php



if(!isset($_SESSION)){
    session_start();
}

include('../conecta.php');
$id = $_SESSION['id_usuario'];

$sql = "SELECT id_documento FROM favoritos WHERE id_usuario = $id";
$resultado = mysqli_query($conexao,$sql);

$id_documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);



foreach($id_documentos as $chave => $id){

    $sql2 = "SELECT * FROM documentos WHERE id = $id[id_documento]";
    $result2 = mysqli_query($conexao, $sql2);
    $documentos[] = mysqli_fetch_assoc($result2);

}

?>
<main>

<?php include ('../interfaces/header.php');

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


}?>

</main>



<?php include('../interfaces/footer.php'); ?>
