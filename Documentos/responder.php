<?php

if (!isset($_SESSION)) {
    session_start();
}
include("../conecta.php");
$url = $_SERVER['HTTP_REFERER'];
$idComentario = $_POST['idComentario'];
$idUsuario = $_POST['idUsuario'];
$resposta = $_POST['resposta'];
$sql = "INSERT INTO `respostas`(`idUsuario`, `idComentario`, `resposta`) VALUES ('$idUsuario','$idComentario', '$resposta')";
var_dump($sql);
$query = mysqli_query($conexao, $sql);
if ($query) {
    header("location:$url");
}
