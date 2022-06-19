
<?php
include "../conecta.php";
$id = $_GET['id'];

$sql = "DELETE FROM documentos WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);


$sql2 = "DELETE FROM tabela_assoc WHERE id_doc=$id";
$resultado2 = mysqli_query($conexao,$sql2);

mysqli_close($conexao);

if($resultado and $resultado2){
    header("Location:../Inicio/index.php");
}
?>
