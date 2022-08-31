<title>Alterar</title>

<style>
  .formAltera {
    color: black !important;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 15px;
    padding-bottom: 15px;
  }

  label {
    color: black !important;
  }

  .TopicosTitulo {
    display: inline-block;
    text-align: center;
  }
</style>

<?php

include "../conecta.php";
include('../funcoes.php');
verificandoNivelUsuario();
$id = $_GET['idDoc'];
$sql = "SELECT * FROM documentos WHERE idDoc=$id";
$resultado = mysqli_query($conexao, $sql);
$documento = mysqli_fetch_array($resultado);

mysqli_close($conexao);


?><?php require_once "../interfaces/header.php"; ?>

<main>
  <br><br><br>
  <form class="container formAltera" action="altera1.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $documento['idDoc']; ?>">

    <div class="input-field">
      <input type="text" name="titulo" value="<?= $documento['tituloDoc']; ?>">
      <label for="titulo">Título</label>
    </div>

    <div class="input-field">
      <select name="forma" value=<?= $documento['forma'] ?>>
        <?php if ($documento['forma'] == "Cópia") { ?>
          <option value=Cópia>Cópia </option>
          <option value=Original>Original </option>
        <?php } else { ?>
          <option value=Original>Original</option>
          <option value=Cópia>Cópia </option><?php } ?>
      </select>
      <label for="forma">Forma</label>
    </div>
    <div class="input-field">
      <input type="text" name="formato" value="<?php echo $documento['formato']; ?>">
      <label for="formato">Formato</label>
    </div>
    <div class="input-field">
      <input type="text" name="especie" value="<?php echo $documento['especie']; ?>">
      <label for="especie">Especie</label>
    </div>
    <div class="input-field">
      <input type="text" name="genero" value="<?php echo $documento['genero']; ?>"><label for="genero">Gênero</label>
    </div>
    <div class="input-field">
      <textarea type="text" class="materialize-textarea " name="localizacao"><?= $documento['localizacao']; ?></textarea>
      <label for="localizacao">Localização</label>
    </div>

    <div class="input-field">
      <input id="ano" type="number" name="ano" min="1" value="<?= $documento['anoDocumento'] ?>" required>
      <label for="ano">Ano do documento</label>
    </div>

    <div class="row">
      <span>Tópico 1</span>
      <select name="1"><?php puxartopicos() ?></select>
    </div>
    <div class="row">
      <span>Tópico 2</span>
      <select name="2">
        <?php puxartopicos() ?>
      </select>
    </div>
    <div class="row">
      <span>Tópico 3</span>
      <select name="3">
        <?php puxartopicos() ?>
      </select>
    </div>
    <div class="row">
      <span>Tópico 4</span>
      <select name="4">
        <?php puxartopicos() ?>
      </select>
    </div>
    <div class="row">
      <span>Tópico 5</span>
      <select name="5">
        <?php puxartopicos() ?>
      </select>

    </div>
    <div class="file-field input-field">
      <div class="btn white"><span><i class="material-icons black-text">attach_file</i></span><input name="arquivo" type="file"></div>
      <div class="file-path-wrapper"><input class="file-path validate" type="text" placeholder="Insira uma imagem"></div>
    </div>
    <div class="row">
      <div class="center">
        <button class="btn-floating waves-effect waves-light white" type="submit" name="action">
          <i class="material-icons black-text">check</i>
        </button>
      </div>
    </div>
  </form><br>
</main><?php require_once "../interfaces/footer.php"; ?>