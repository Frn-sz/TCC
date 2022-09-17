<?php
include('../interfaces/header.php');
if (!isset($_SESSION)) {
    session_start();
}
?>
<style>
    .caixaInfo {
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        padding: 12px;

    }

    .arquivoMunicipal {

        border: black;
        border-radius: 10px;

    }

    h3 {
        margin-left: 5%;
    }
</style>

<main>
    <br><br><br><br>
    <div class="container caixaInfo">
        <div class="row">
            <div class="left-on-med">
                <h3> Sobre o sistema </h3>
            </div>
        </div>
        <span>dsakjdsajda</span>
        <div class="row">
            <div class="right">
                <img class="arquivoMunicipal materialboxed" width=800 src="../Imagens/arquivoMunicipal.jpg">
            </div>
        </div>

    </div>

</main>









<?php include('../interfaces/footer.php'); ?>