<?php
include('../interfaces/header.php');
if (!isset($_SESSION)) {
    session_start();
}
?>
<style>
    .caixaInfo {

        border-radius: 10px;
        padding: 12px;
        color: white !important;

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
    <div class="caixaInfo">
        <div class="row">
            <div class="left-on-med">
                <h3 class="center"> Sobre o sistema </h3>
            </div>
        </div>
        <p>dsakjdsajda</p>
        <div class="row">
            <div class="right">
                <img class="arquivoMunicipal materialboxed" width=800 src="../Imagens/arquivoMunicipal.jpg">
            </div>
        </div>

    </div>

</main>









<?php include('../interfaces/footer.php'); ?>