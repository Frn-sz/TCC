<?php 

function puxartopicos(){

  include "../conecta.php";


  $sql = "SELECT `id`, `titulo` FROM `topicos`";
  $resultado = mysqli_query($conexao, $sql);
  $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);

  echo "<option value = ''>Escolha um tópico</option>";
  foreach ($topicos as $chave => $topico) {
  $titulo = $topico['titulo'];
  $id = $topico['id'];
  
  echo "<option value = $id> $titulo </option>";
  
}
}

function exibeMensagens() {
  if (isset($_SESSION['mensagem'])) {
      $msg = $_SESSION['mensagem'];
      unset($_SESSION['mensagem']);
      return $msg;
  }
}

function verificandoNivelUsuario(){
  session_start();
  if(!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] != 1){
      
      header("Location:../Inicio/");

  }
}


?>