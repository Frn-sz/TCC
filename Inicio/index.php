<link rel="stylesheet" href="../OwlCarousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../OwlCarousel/dist/assets/owl.theme.default.min.css">
<?php
include('../interfaces/header.php');
if (!isset($_SESSION)) {
    session_start();
}

include('../conecta.php');

$pegandoIds = "SELECT idDoc FROM documentos WHERE imagem != ''";
$resultSet = mysqli_query($conexao, $pegandoIds);
$query = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);
$QtndDocs = count($query);

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

?>
<style>
   .item {
          height: 40vh;
          max-width: 45vh;
          overflow: hidden !important;
          display: flex !important;
          align-items: flex-start !important;
     }
</style>
<main>
    <br><br><br><br>
    <div class="container">
    <div class="owl-carousel owl-theme">
        <?php
        foreach ($documentos as $documento) { ?>
            <div class="zoom">
                <div class="item"><a href = "../Documentos/vermais.php?idDoc=<?=$documento['idDoc']?>"><img class="imagemCarousel hoverable" src="../upload/<?= $documento['imagem'] ?>"></a></div>
            </div>
        <?php }

        ?>
    </div>
    </div>
</main>


<?php include('../interfaces/footer.php'); ?>

<script src="../OwlCarousel/dist/owl.carousel.js"></script>
<script type="text/javascript">
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 5,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        autoWidth:true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: true
            }
        }
    });
</script>