
<?php

require_once "../conecta.php";

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$sql = "UPDATE `topicos` SET `titulo`='$titulo' WHERE id='$id'";
var_dump($sql);
$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);


if ($resultado) {
    header("Location: topicos.php");
}



?>