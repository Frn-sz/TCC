
<?php
include "../conecta.php";
$id = $_GET['id'];

$sql = "DELETE FROM documentos WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
    header("Location:../Inicio/index.php");
}
?>
