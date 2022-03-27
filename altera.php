
<?php

require_once "conecta.php";

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $forma = $_POST['forma'];
    $formato = $_POST['formato'];
    $especie = $_POST['especie'];
    $genero = $_POST['genero'];
    $locali = $_POST['locali'];
    $nv1 = $_POST['nv1'];
    $nv2 = $_POST['nv2'];
    $nv3 = $_POST['nv3'];
    $nv4 = $_POST['nv4'];
    $nv5 = $_POST['nv5'];
    
$sql = "UPDATE biblioteca SET titulo='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',locali='$locali',

nv1='$nv1',nv2='$nv2',nv3='$nv3',nv4='$nv4',nv5='$nv5' WHERE id=$id "; 

$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
    header("Location: index.php");
}


?>