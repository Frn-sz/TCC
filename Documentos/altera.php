
<?php

require_once "../conecta.php";

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $forma = $_POST['forma'];
    $formato = $_POST['formato'];
    $especie = $_POST['especie'];
    $genero = $_POST['genero'];
    $localizacao = $_POST['localizacao'];
    $topico1 = $_POST['topico1'];
    $topico2 = $_POST['topico2'];
    $topico3 = $_POST['topico3'];
    $topico4 = $_POST['topico4'];
    $topcio5 = $_POST['topico5'];
    //$imagem  = $_FILES['imagem'];
    
$sql = "UPDATE documentos SET titulo='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao',

topico1='$topico1',topico2='$topico2',topico3='$topico3',topico4='$topico4',topico5='$topico4' WHERE id=$id "; 

$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
    header("Location: ../Inicio/index.php");
}


?>