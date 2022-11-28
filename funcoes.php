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
            <div class="caixa">
              <div class='col s6 m3'>
                <div class='card hoverable'>
                  <div class='card-image cardindex'>
                    <?php if ($documento['imagem'] != "") {  ?>
                      <img class='imagem' src='../upload/<?= $documento['imagem'] ?>'>
                    <?php } else { ?>
                      <img class='imagem' src='../Imagens/placeholderSemImagem.png'>
                    <?php } ?>
                  </div>
                  <div class='card-content'>
                    <span class='card-title'><?= $documento['tituloDoc'] ?></span>
                    <p> Forma: <?= $documento['forma'] ?> <br></p>
                    <p> Formato: <?= $documento['formato'] ?> <br></p>
                    <p> Espécie:<?= $documento['especie']  ?></p>
                  </div>
                  <div class='card-action center'>

                    <?php if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) { ?>

                      <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>

                    <?php } else { ?>

                      <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>

                    <?php } ?>

                    <?php if (isset($_SESSION['nvl_usuario'])) {

                      if ($_SESSION['nvl_usuario'] != 2) { ?>
                        &nbsp
                        <a href='../Documentos/formaltera.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light  white'> <i class='material-icons black-text'>edit</i> </a>
                        &nbsp
                        <a class="waves-effect waves-light btn-floating modal-trigger white " href="#modal<?= $documento['idDoc'] ?>"><i class="material-icons black-text">delete</i></a>
                    <?php }
                    } ?>
                  </div>
                </div>
              </div>
          </a>
    </div>



    <div id="modal<?= $documento['idDoc'] ?>" class="modal">
      <div class="modal-content">
        <div class="row">
          <div class="center">
            <h4 class="black-text">Deseja mesmo excluir este documento?</h4>
          </div>
        </div>
        <form action="../Documentos/excluir.php" method="get">
          <div class="row">
            <div class="center">
              <input type="hidden" name="idDoc" value="<?= $documento['idDoc']; ?>">
            </div>
          </div>
          <div class="center">
            <button type="submit" class="btn waves-effect waves-green white black-text">Confirmar</button>
            <a href="#!" class="modal-close waves-effect waves-red white btn black-text">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
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
function listarComentarios(int $idDocumento, int $idAtual)
{
  include('conecta.php');
  $sql = "SELECT * FROM comentarios WHERE idDocumento = '$idDocumento'";
  $query = mysqli_query($conexao, $sql);
  $comentarios = mysqli_fetch_all($query, MYSQLI_ASSOC);

  foreach ($comentarios as $comentario) {
    $sql = "SELECT * FROM `user` WHERE id = '$comentario[idUsuario]'";
    $query = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_assoc($query);

?>

  <div style="display:flex;" class="infoUsuario">
    <img class="materialboxed" width=50 src="../upload/<?= $usuario['foto']; ?>" alt="">
    &nbsp&nbsp
    <p><?= $usuario['nome']; ?></p>
    &nbsp&nbsp&nbsp
    <p><?= $comentario['comentario'] ?></p>
  </div>
  <p><a class="white-text modal-trigger" href="#modalComentario<?= $comentario['id'] ?>">Responder</a></p>
  <div id="modalComentario<?= $comentario['id'] ?>" class="modal">
    <div class="modal-content ">
      <form action="responder.php" method="post">
        <textarea name="resposta" class="materialize-textarea black-text" id="resposta"></textarea>
        <label class="black-text" for="resposta">Insira sua resposta</label>
        <input type="hidden" name="idComentario" value="<?= $comentario['id'] ?>">
        <input type="hidden" name="idUsuario" value="<?= $idAtual ?>">
        <br><br><br>
        <button type="submit" class="buttonComentario right black white-text">Responder</button>
        <br><br>
      </form>
    </div>
  </div>
  <div class="operacoes right" style="margin-top:-8%">
    <?php if ($idAtual == $usuario['id'] or $_SESSION['nvl_usuario'] == 1) { ?>
      <a class="white-text" href="excluirComentario.php?id=<?= $comentario['id'] ?>"> <i class="material-icons right">delete</i></a>
    <?php } ?>
  </div>
  <?php
    $sql = "SELECT * FROM respostas WHERE idComentario = '$comentario[id]'";
    $query = mysqli_query($conexao, $sql);
    $respostas = mysqli_fetch_all($query, MYSQLI_ASSOC);

    foreach ($respostas as $resposta) {
      $sql = "SELECT * FROM `user` WHERE id = '$resposta[idUsuario]'";
      $query = mysqli_query($conexao, $sql);
      $usuario = mysqli_fetch_assoc($query);

  ?>
    <div style="margin-left:5%" class="respostas">
      <div style="display:flex;" class="infoUsuario">
        <img class="materialboxed" width=50 src="../upload/<?= $usuario['foto']; ?>" alt="">
        &nbsp&nbsp
        <p><?= $usuario['nome']; ?></p>
        &nbsp&nbsp&nbsp
        <p><?= $resposta['resposta'] ?></p>
      </div>
      <div class="operacoes right" style="margin-top:-4%">
        <?php if ($idAtual == $usuario['id'] or $_SESSION['nvl_usuario'] == 1) { ?>
          <a class="white-text" href="excluirResposta.php?id=<?= $resposta['id'] ?>"> <i class="material-icons right">delete</i></a>
        <?php } ?>
      </div>
    </div>
    <br>
<?php
    }
  }
}
