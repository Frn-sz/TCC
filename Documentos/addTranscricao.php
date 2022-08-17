<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../conecta.php');
include('../interfaces/header.php');

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
                <textarea id="transcricao" class="materialize-textarea" name="transcricao"></textarea>
                <label for="transcricao">Adicione a transcrição do Documento</label>
                <div class="center">
                    <button type="submit" class="btn"><i class="material-icons">check</i></button>
                </div>
            </div>

        </div>

    </form>


</main>




<?php include('../interfaces/footer.php'); ?>