
<?php
include "../conecta.php";
$id = $_GET['idDoc'];
$pegandoImagem = "SELECT imagem FROM documentos WHERE idDoc ='$id'";
$sqlImagem = mysqli_query($conexao, $pegandoImagem);
$Imagem = mysqli_fetch_assoc($sqlImagem);
$sql2 = "DELETE FROM tabela_assoc WHERE id_doc='$id'";
$resultado2 = mysqli_query($conexao, $sql2);
$sql = "DELETE FROM documentos WHERE idDoc='$id'";
$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);

if ($resultado && $resultado2) {
    unlink("../upload/" . $Imagem['imagem']);
    header("Location:../Inicio/index.php");
}
?>
