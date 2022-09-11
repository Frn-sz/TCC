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
if ($QtndDocs < 5) {
    $Keys = array_rand($ids, $QtndDocs);
} else if ($QtndDocs >= 5) {
    $Keys = array_rand($ids, 5);
}

foreach ($Keys as $key) {
    $pegandoDocumentos = "SELECT * FROM documentos WHERE idDoc = '$ids[$key]' AND imagem != ''";
    $resultSet = mysqli_query($conexao, $pegandoDocumentos);
    $documentos[] = mysqli_fetch_assoc($resultSet);
}


?>

<main>
    <br><br><br><br>

</main>
<?php include('../interfaces/footer.php'); ?>