<?php

if (!isset($_SESSION)) {
    session_start();
}
include("../conecta.php");
$url = $_SERVER['HTTP_REFERER'];
$comentario = $_POST['comentario'];
$idUsuario = $_POST['id'];
$idDocumento = $_POST['idDocumento'];
$sql = "INSERT INTO `comentarios`(`idUsuario`, `comentario`, `idDocumento`) VALUES ('$idUsuario','$comentario', '$idDocumento')";
$query = mysqli_query($conexao, $sql);
var_dump($sql);
if ($query) {
    echo "sda";
    header("location:$url");
}
