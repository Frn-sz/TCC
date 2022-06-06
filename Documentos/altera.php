
<?php

require_once "../conecta.php";
if(isset($_FILES['arquivo'])){

	$ext = strrchr($_FILES['arquivo']['name'], '.');
	$nome = md5(time()).$ext;
	$dir = "../upload/";
	move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$nome);

}
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
    $imagem  = $nome;
    $imagemx = $_POST['imagem'];
    
if(isset($_FILES['arquivo'])){
$sql = "UPDATE documentos SET titulo='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao',

topico1='$topico1',topico2='$topico2',topico3='$topico3',topico4='$topico4',topico5='$topico5', imagem = '$imagem' WHERE id=$id "; 

var_dump($sql);
}else{

    $sql = "UPDATE documentos SET titulo='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao',

topico1='$topico1',topico2='$topico2',topico3='$topico3',topico4='$topico4',topico5='$topico5' WHERE id=$id "; 

}
$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
    header("Location: ../Inicio/index.php");
}


?>