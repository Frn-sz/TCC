
<?php
include "../conecta.php";
$id = $_GET['id'];
$pegandoImagem = "SELECT imagem FROM documentos WHERE id='$id'";
$sqlImagem = mysqli_query($conexao, $pegandoImagem);
$Imagem = mysqli_fetch_assoc($sqlImagem);
$sql = "DELETE FROM documentos WHERE id='$id'";
$resultado = mysqli_query($conexao,$sql);
$sql2 = "DELETE FROM tabela_assoc WHERE id_doc='$id'";
$resultado2 = mysqli_query($conexao,$sql2);

mysqli_close($conexao);

if($resultado and $resultado2){
    unlink("../upload/" . $Imagem['imagem']);
    header("Location:../Inicio/index.php");
}
?>
