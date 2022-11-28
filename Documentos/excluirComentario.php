<?php
include("../conecta.php");
$idComentario = $_GET['id'];
$url = $_SERVER['HTTP_REFERER'];
$sql = "DELETE FROM respostas WHERE idComentario = '$idComentario'";
$query = mysqli_query($conexao, $sql);

if ($query) {
    $sql = "DELETE FROM comentarios WHERE id = '$idComentario'";
    $query = mysqli_query($conexao, $sql);
    if ($query) {
        header("location:$url");
    }
}
