<?php 

if(!isset($_SESSION)){
     session_start();
}

?>

<title>Resultado da Pesquisa</title>

<script>
//Função que faz um pop-up na tela pra confirmar a exclusão de um documento.
function confirmacao(id) {
     var resposta = confirm("Deseja remover este documento?");
     if (resposta == true) {
          window.location.href = "../Documentos/excluir.php?id="+id;
     }
}
</script>
</head>



<main>

<?php


include('../conecta.php');
include('../interfaces/header.php');

?><br><?php

$pesquisa = "%" . trim($_GET['busca']) . "%";

$sql = "SELECT id FROM topicos WHERE titulo LIKE '$pesquisa'";
$resultado = mysqli_query($conexao,$sql);
$id_topicos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

if(isset($id_topicos[0]['id'])){
foreach($id_topicos as $chave => $ids){

     $sql2 = "SELECT id_doc FROM tabela_assoc WHERE id_topico = '$ids[id]'";
     $result = mysqli_query($conexao,$sql2);
     $id_docs[] = mysqli_fetch_all($result, MYSQLI_ASSOC);
     
} 

foreach($id_docs as $chave => $id_doc){
     foreach($id_doc as $chave => $id){
     $sql3 = "SELECT id FROM documentos WHERE id = $id[id_doc] ";
     $result3 = mysqli_query($conexao,$sql3);
     $documentos[] = mysqli_fetch_assoc($result3);
     }
}

     foreach($documentos as $chave => $ids_doc){
          $idsx[] = $ids_doc['id'];
     
     }

     foreach($idsx as $chave => $idx){

          $sql4 = "SELECT * FROM documentos WHERE id = $idx";
          $resultado4 = mysqli_query($conexao,$sql4);
          $documentosx[] = mysqli_fetch_assoc($resultado4);
     }
?>
     <div class = 'container'><div class='row'>
  <?php    foreach($documentosx as $chave => $documentoy){ ?>
     
        <div class='col s2 m4'>
            <div class='card'>
              <div class='card-image cardpesquisa'>
     
     
             <?php  if($documentoy['imagem'] != ""){  ?>
              <img class='materialboxed imagem' src ='../upload/<?=$documentoy['imagem']?>'>
             <?php }else{ ?>
              <div class='center'>
               Sem imagem
               </div>
              <?php } ?>
     
             <span class='card-title black-text'><?= $documentoy['titulo'] ?></span>
              </div>
              <div class='card-content'>
                <p> Forma:<?=  $documentoy['forma'] ?><br></p>
                <p> Formato:<?=  $documentoy['formato']?> <br></p>
                <p> Espécie: <?= $documentoy['especie'] ?></p>
              </div>
              <div class='card-action center'>
               <?php if(!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) { ?>
              <a href = '../Documentos/vermais.php?id=<?=$documentoy['id']?>' class = 'btn-large waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>
              <?php } ?>
              <?php if(isset($_SESSION['nvl_usuario'])){ 
              if($_SESSION['nvl_usuario'] == 1){?>
               <a href = '../Documentos/vermais.php?id=<?=$documentoy['id']?>' class = 'btn-floating waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>
               <a href= '../Documentos/formaltera.php?id=<?=$documentoy['id']?>' class = 'btn-floating waves-effect waves-light  blue darken-4'> <i class ='material-icons'>edit</i>  </a>
               <a href='#' onclick='confirmacao($documentoy[id])' class = 'btn-floating waves-effect waves-light blue darken-4'>  <i class = 'material-icons'> delete </i> </a>
              <?php }} ?>
             </div>
            </div>
          </div>
     
     
     <?php } ?>
     </div></div>
     <?php }else{?>
          <div class="row">
               <div class="col offset-s2">
                    <h3>Não foram encontrados resultado </h3>
               </div>
          </div>

<?php } ?>



</main>
<?php require_once "../interfaces/footer.php" ?>



</body>     
