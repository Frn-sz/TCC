<?php

if(!isset($_SESSION)){
    session_start();
}

include('../conecta.php');
$url = $_SERVER['HTTP_REFERER'];
$id_documento = $_GET['id'];
$id_usuario = $_SESSION['id_usuario'];
$sql = "DELETE FROM favoritos WHERE id_documento = '$id_documento' and id_usuario = '$id_usuario'";
var_dump($sql);
$result = mysqli_query($conexao, $sql);

if($result){
    header("location: $url");
}
?>