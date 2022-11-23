<?php
include('../conecta.php');
include('../funcoes.php');
$url = $_SERVER['HTTP_REFERER'];
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id_usuario']) || $_SESSION['nvl_usuario'] != 1) {
    header("Location:../Inicio/listaDocs.php");
}
$id_usuario = $_GET['id'];
$fotoAntiga = puxarFotoUsuario($id_usuario);
$sql = "DELETE FROM user WHERE id='$id_usuario'";
$result = mysqli_query($conexao, $sql);
$removerFavoritos = deletarFavoritos($id_usuario, "id_usuario");
if ($result and $removerFavoritos) {
    unlink("../upload/" . $fotoAntiga['foto']);
    header("location:$url");
}
