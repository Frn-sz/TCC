
<?php

function puxartopicos(){

  include "../conecta.php";


  $sql = "SELECT `id`, `titulo` FROM `topicos`";
  $resultado = mysqli_query($conexao, $sql);
  $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
  foreach ($topicos as $chave => $topico) {
    $titulo = $topico['titulo'];
    $id = $topico['id'];
    
    echo "<option value = $id> $titulo </option>";
    
  }
}

?>
   
    <main> 
   <?php require_once "../interfaces/header.php"; ?>
   
    <form action = "inseretop.php" method="post">
    <div class="container">
        <div class="row">
            <select name = "1"><?= puxartopicos() ?> </select>
        </div>
        <div class="row">
            <select name = "2"><?= puxartopicos() ?> </select>
        </div>
        <div class="row">
            <select name = "3"><?= puxartopicos() ?> </select>
        </div>
        <div class="row">
            <select name = "4"><?= puxartopicos() ?> </select>
        </div>
        <div class="row">
            <select name = "5"><?= puxartopicos() ?> </select>
        </div>
        <div class="row">
        <div class="col offset-s6">
        <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action"><i class="material-icons">check</i></button>
        </div>   
        </div>
    </div>
    </form>
    </main>


<?php include_once "../interfaces/footer.php"; ?>
