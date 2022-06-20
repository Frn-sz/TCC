<style>
        .button--add {
    width: 30px;
    height: 30px;
    background-color: #596BE3;
    color: #fff;
    border-radius: 100%;
    font-size: 20px;
}
.event--button--add::before {
    content: '+';
}
.button--remove::before {
    content: 'x';
}
.flex--button-add {
    display: flex;
    align-items: stretch;
    justify-content: center;
    flex-direction: row;
    align-content: stretch;
}
    </style>

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
      <ol class="pessoa-famosa-info">
        <div class="form--area--famosa--00 event--form--clone">
            <li class="event--form--clone--01 event--remove--li">
            <select name=""> <?php puxartopicos() ?> </select>
            </li>
        </div>
        <div class="form--area--famosa--01">
            <div class="button--add event--button--add flex--button-add" title="adicionar mais um membro">
            </div>
            <div style='display: none;' class="flex--button-add button--add event--button--remove " title="adicionar mais um membro">
                <div class="flex--button-add button--remove event--remove " title="remover membro da familia">
                </div>
            </div>
        </div>
        <input value='' name="qt_famoso" class='qt_famoso' type="hidden">
    </ol>
    <script type="text/javascript" src="../script.js"></script>
      <button id = "x" class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Cadastrar<i class="material-icons right">check</i></button>
    </form>
    </main>
</body>

<?php include_once "../interfaces/footer.php"; ?>
</html>