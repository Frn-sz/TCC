	
    <?php
    require_once('../vendor/autoload.php');

    use thiagoalessio\TesseractOCR\TesseractOCR;

    include('../conecta.php');
    $idDoc = $_GET['id'];
    $PegandoFoto = "SELECT imagem FROM documentos WHERE idDoc='$idDoc'";
    $resultSet = mysqli_query($conexao, $PegandoFoto);
    $foto = mysqli_fetch_assoc($resultSet);


    $texto = (new TesseractOCR('../upload/' . $foto['imagem']))
        ->run();

    var_dump($texto);

    ?>