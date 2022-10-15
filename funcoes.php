<?php

function puxartopicos()
{
  include "../conecta.php";
  $sql = "SELECT * FROM `topicos`";
  $resultado = mysqli_query($conexao, $sql);
  $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
?> <option value=0> Selecione um tópico </option>";
  <?php
  foreach ($topicos as $topico) {
    if ($topico['tituloTop'] != "-") {
      $titulo = $topico['tituloTop'];
      $id = $topico['idTop']; ?>
      <option class="selectTopicos" value=$id><?= $titulo ?> </option>";
<?php }
  }
}

function exibeMensagens()
{
  if (isset($_SESSION['mensagem'])) {
    $msg = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
    return $msg;
  }
}

function verificandoNivelUsuario()
{
  session_start();
  if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) {

    header("Location:../Inicio/");
  }
}
