<?php

include('../conecta.php');
if(!isset($_SESSION)){
session_start();
}

$id_usuario = $_SESSION['id_usuario'];
$id_documento = $_POST['id'];

$url = $_SERVER['HTTP_REFERER'];
$sql = "INSERT INTO favoritos (id_usuario, id_documento) VALUES ('$id_usuario','$id_documento')";
$result = mysqli_query($conexao,$sql);

if($result){
    header("location:".$url);
}
?>