<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../conecta.php');
$pegandoIds = "SELECT idDoc FROM documentos WHERE imagem != ''";
$resultSet = mysqli_query($conexao, $pegandoIds);
$query = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);
$QtndDocs = count($query);
$return = True;

if (!$QtndDocs == "0") {
    foreach ($query as $id) {
        $ids[] = $id['idDoc'];
    }

    if ($QtndDocs != 1) {
        if ($QtndDocs < 5) {
            $Keys = array_rand($ids, $QtndDocs);
        } else if ($QtndDocs >= 5) {
            $Keys = array_rand($ids, 5);
        }
    } else if ($QtndDocs == 1) {
        $Keys[] = array_rand($ids, $QtndDocs);
    }
    foreach ($Keys as $key) {
        $pegandoDocumentos = "SELECT * FROM documentos WHERE idDoc = '$ids[$key]' AND imagem != ''";
        $resultSet = mysqli_query($conexao, $pegandoDocumentos);
        $documentos[] = mysqli_fetch_assoc($resultSet);
    }
} else {
    $return = false;
}
include('../interfaces/header.php');
?>
<style>
    .item {
        max-height: 60vh;
        max-width: 40vh;
        overflow: hidden !important;
        display: flex !important;
        align-items: flex-start !important;
    }

    .owl-carousel {

        padding: 50px;
        border-radius: 5px;
    }

    .Alguns {
        text-align: center;
        color: white;
    }

    .imagemCarousel {
        border-radius: 5px;
    }

    .NaoHa {
        color: white;
    }
</style>
<main>
    <br><br><br><br><br>

    <?php if ($return == True) { ?>
        <h3 class="Alguns">Confira os documentos cadastrados!</h3>
        <div class="caixaCarrossel">
            <div class="container ">
                <div class="owl-carousel owl-theme">
                    <?php
                    foreach ($documentos as $documento) { ?>
                        <div class="zoom">
                            <div class="item">
                                <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>">
                                    <img class="imagemCarousel hoverable" src="../upload/<?= $documento['imagem'] ?>">
                                </a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } else { ?>

        <div class="row">
            <div class="center container NaoHa">
                <h5>Não há nenhum documento com foto cadastrado no momento</h5>
            </div>
        </div>

    <?php } ?>

</main>



<?php include('../interfaces/footer.php'); ?>

<script type="text/javascript">
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 3,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        autoWidth: true,
        loop: true,
        autoHeight: true,
        autoHeightClass: 'owl-height'

    });
</script>