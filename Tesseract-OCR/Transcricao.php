	
    <?php
    include('../conecta.php');
    $idDoc = $_GET['id'];
    $PegandoFoto = "SELECT imagem FROM documentos WHERE idDoc='$idDoc'";
    $resultSet = mysqli_query($conexao, $PegandoFoto);
    $foto = mysqli_fetch_assoc($resultSet);

    $output =  shell_exec('tesseract ../upload/3714e3620b0d9e0d5fa443e63b7ca048.jpg transcrição.txt');


    echo "<br>
	<h3>OCR after reading</h3><br>
	<pre>";

    $myfile = fopen("out.txt", "r") or die("Unable to open file!");
    echo fread($myfile, filesize("out.txt"));
    fclose($myfile);
    echo "</pre>";
    die;

    ?>