<title>Alterar</title>


<?php

include "../conecta.php";
include('../funcoes.php');
verificandoNivelUsuario();
$id = $_GET['id'];
$sql = "SELECT * FROM documentos WHERE id=$id";
$resultado = mysqli_query($conexao, $sql);
$documento = mysqli_fetch_array($resultado);

mysqli_close($conexao);


?>
<?php require_once "../interfaces/header.php"; ?>
<main>

  <form class="container" action="altera1.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $documento['id']; ?>">
    <br>
    <div class="input-field">
      <input type="text" name="titulo" value="<?php echo $documento['titulo']; ?>">
      <label for="titulo">Título</label>
    </div>

    <div class="input-field">
      <select name="forma" value=<?= $documento['forma'] ?>>
        <?php if ($documento['forma'] == "Cópia") { ?>
          <option value=Cópia> Cópia </option>
          <option value=Original> Original </option>
        <?php } else { ?>
          <option value=Original> Original</option>
          <option value=Cópia> Cópia </option>
        <?php } ?>
        ?>>
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
      <input type="text" name="genero" value="<?php echo $documento['genero']; ?>">
      <label for="genero">Gênero</label>
    </div>

    <div class="input-field">
      <textarea type="text" class="materialize-textarea white-text" name="localizacao"><?= $documento['localizacao']; ?></textarea>
      <label for="localizacao">Localização</label>
    </div>



    <div class="row">
      <span class="white-text">Tópico 1</span><select name="0"> <?php puxartopicos() ?> </select>
    </div>
    <div class="row">
      <span class="white-text">Tópico 2</span><select name="1"> <?php puxartopicos() ?> </select>
    </div>
    <div class="row">
      <span class="white-text">Tópico 3</span><select name="2"> <?php puxartopicos() ?> </select>
    </div>
    <div class="row">
      <span class="white-text">Tópico 4</span><select name="3"> <?php puxartopicos() ?> </select>
    </div>
    <div class="row">
      <span class="white-text">Tópico 5</span><select name="4"> <?php puxartopicos() ?> </select>
    </div>

    <div class="file-field input-field">
      <div class="btn grey darken-1">
        <span><i class="material-icons large">attach_file</i> </span>
        <input name="arquivo" type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Insira uma imagem">
      </div>
    </div>
    <div class="row">
      <div class="center">
        <button id="y" style='border-radius:10px;' class="btn waves-effect waves-light grey darken-1" type="reset">
          <i class="material-icons">cancel</i>
        </button>
        <button id="x" style='border-radius:10px;' class="btn waves-effect waves-light grey darken-1" type="submit" name="action">
          <i class="material-icons">check</i>
        </button>
      </div>
    </div>

  </form>


  <br>



</main>


<?php require_once "../interfaces/footer.php"; ?>