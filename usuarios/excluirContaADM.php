<?php
include('../conecta.php');
$url = $_SERVER['HTTP_REFERER'];
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['$id_usuario']) || $_SESSION['nvl_usuario'] != 1) {
    header("Location:../Inicio/");
}
$id_usuario = $_GET['id'];
$sql = "DELETE FROM user WHERE id='$id_usuario'";
$result = mysqli_query($conexao, $sql);
$removerFavoritos = "DELETE FROM favoritos WHERE id_usuario='$id_usuario'";
$resultSet = mysqli_query($conexao, $removerFavoritos);
if ($result and $resultSet) {
    unlink("../upload/" . $_SESSION['foto']);
    header("location:$url");
}
