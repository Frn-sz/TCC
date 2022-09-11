<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../vendor/autoload.php');

use thiagoalessio\TesseractOCR\TesseractOCR;

include('../conecta.php');
include('../interfaces/header.php');
$url = $_SERVER['HTTP_REFERER'];
$idDoc = $_GET['idDoc'];
$verificacao = $_GET['auto'];
$PegandoFoto = "SELECT * FROM documentos WHERE idDoc='$idDoc'";
$resultSet = mysqli_query($conexao, $PegandoFoto);
$doc = mysqli_fetch_assoc($resultSet);
if ($verificacao == 1) {
    $texto = (new TesseractOCR('../upload/' . $doc['imagem']))
        ->run();
} else {
    $texto = $doc["transcricao"];
}
?>
<style>
    .box {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 15px;
        border-radius: 10px;
    }

    label {
        color: black !important;
    }

    .btn {
        background-color: white;
        color: black;
        display: inline;
        border-radius: 10px;
    }

    .btn:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }
</style>

<main>
    <br><br><br><br><br><br>
    <form action="addTranscricao2.php" method="post">
        <div class="container box">
            <div class="input-field">
                <textarea id="transcricao" class="materialize-textarea" name="transcricao"><?= $texto ?></textarea>
                <label for="transcricao">Adicione a transcrição do Documento</label>
                <div class="center">
                    <input type="hidden" value=<?= $url ?> name="url">
                    <input type="hidden" value=<?= $idDoc ?> name="idDoc">
                    <button type="submit" class="btn"><i class="material-icons">check</i></button>
                </div>
            </div>

        </div>

    </form>


</main>




<?php include('../interfaces/footer.php'); ?>