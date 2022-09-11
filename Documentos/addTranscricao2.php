<?php
include('../conecta.php');
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] != 1) {
    header("location:../Inicio/");
    die;
}
$idDoc = $_POST['idDoc'];
$url = $_POST['url'];
$transcricao = mysqli_real_escape_string($conexao, $_POST['transcricao']);
$insert = "UPDATE `documentos` SET `transcricao` = '$transcricao' WHERE idDoc = '$idDoc'";
var_dump(
    $insert
);
$result = mysqli_query($conexao, $insert);
if ($result) {
    header("location:$url");
}
