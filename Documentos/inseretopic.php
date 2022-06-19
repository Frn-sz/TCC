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
    <?php include_once "../interfaces/header.php"?>
    <main>  
    <form action = "inseretop.php" method="post">
    <div class="container">
      <p> Tópico 1: <select name="1"> <?php puxartopicos() ?> </select> </p>
      <p> Tópico 2: <select name="2"> <?php puxartopicos() ?> </select></p>
      <p> Tópico 3: <select name="3"> <?php puxartopicos() ?> </select></p>
      <p> Tópico 4: <select name="4"> <?php puxartopicos() ?> </select></p>
      <p> Tópico 5: <select name="5"> <?php puxartopicos() ?> </select></p>
    </div>
      <button id = "x" class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Cadastrar<i class="material-icons right">check</i></button>
    </form>
    </main>
</body>

<?php include_once "../interfaces/footer.php"; ?>
</html>