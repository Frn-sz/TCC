<title>Alterar</title>
<style>
    .formAltera {
        border-radius: 10px;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    label {
        color: white !important;
    }

    .TopicosTitulo {
        display: inline-block;
        text-align: center;
    }

    input {
        color: white !important;
    }

    button {
        border-radius: 10% !important;
    }
</style>

<?php
include "../conecta.php";
require_once "../interfaces/header.php";
$id = $_GET['idTop'];
$sql = "SELECT * FROM topicos WHERE idTop='$id'";
$resultado = mysqli_query($conexao, $sql);
$topicos = mysqli_fetch_array($resultado, MYSQLI_BOTH);
mysqli_close($conexao);
?>
<main>
    <br><br><br><br>
    <div class="container formAltera">
        <form action="alterat.php" method="post">
            <input type="hidden" name="id" value="<?= $topicos['idTop']; ?>">
            <div class="input-field">
                <input type="text" name="titulo" value="<?= $topicos['tituloTop']; ?>">
                <label for="titulo">Título</label>
            </div>
            <div class="center">
                <button class="btn waves-effect waves-light black-text white" type="submit" name="action">
                    <i class="material-icons">check</i>
                </button>
            </div>
        </form>
    </div>
</main>

<?php include('../interfaces/footer.php'); ?>