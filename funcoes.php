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
      <option class="selectTopicos" value=<?= $id ?>><?= $titulo ?> </option>";
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

function verificandoNivelUsuario(): void
{
  if (!isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) {

    header("Location:../Inicio/");
  }
}

function buscaTopicos(string $busca)
{
  if (!isset($_SESSION)) {
    session_start();
  }
  include("conecta.php");
  $busca = "%" . mysqli_real_escape_string($conexao, $busca) . "%";
  $sql = "SELECT * FROM topicos WHERE tituloTop LIKE '$busca'";
  $query = mysqli_query($conexao, $sql);
  $topicos = mysqli_fetch_all($query, MYSQLI_ASSOC);
  foreach ($topicos as $topico) { ?>
    <div class="center">
      <h1 class="white-text"><?= $topico['tituloTop']; ?></h1>
    </div>
    <div class="row container">
      <?php
      $idTopico = $topico['idTop'];
      $sql = "SELECT id_doc FROM tabela_assoc WHERE id_topico = '$idTopico'";
      $query = mysqli_query($conexao, $sql);
      $idDocs = mysqli_fetch_all($query, MYSQLI_ASSOC);
      foreach ($idDocs as $idDoc) {
        $idDoc = $idDoc['id_doc'];
        $sql = "SELECT * FROM documentos WHERE idDoc = '$idDoc'";
        $query = mysqli_query($conexao, $sql);
        $documentos[] = mysqli_fetch_assoc($query);
        foreach ($documentos as $documento) {

      ?>

          <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>">

            <div class="col s14 m3 cardDocTopico">
              <div class="card">
                <div class="card-image">
                  <?php if ($documento['imagem'] != NULL) { ?>
                    <img class="imagemDocTopico hoverable" src="../upload/<?= $documento['imagem'] ?>">
                  <?php } else { ?>
                    <img src="../Imagens/placeholderSemImagem.png" alt="">
                  <?php } ?>
                  <span class="card-title"></span>
                </div>
                <div class="card-content">
                  <h4><?= $documento['tituloDoc'] ?></h4>
                </div>
                <div class="card-action">
                  <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>"><i class="material-icons">search</i></a>
                </div>
              </div>
            </div>
          </a>
      <?php
          unset($documentos);
        }
      } ?>
    </div>
<?php
  }
}
function puxarFotoUsuario(int $idUsuario): array
{
  include("conecta.php");
  $sql = "SELECT foto FROM `user` WHERE id = '$idUsuario'";
  $query = mysqli_query($conexao, $sql);
  $foto = mysqli_fetch_assoc($query);
  return $foto;
}

function deletarFavoritos(int $id, string  $campo): bool
{
  include('conecta.php');
  $sql = "DELETE from favoritos WHERE $campo = $id";
  $query = mysqli_query($conexao, $sql);
  if ($query) {
    return True;
  } else {
    return False;
  }
}
