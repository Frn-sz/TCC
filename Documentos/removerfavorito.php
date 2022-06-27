<?php

if(!isset($_SESSION)){
    session_start();
}

include('../conecta.php');
$url = $_SERVER['HTTP_REFERER'];
$id = $_GET['id'];
$sql = "DELETE FROM favoritos WHERE id_documento = $id";
$result = mysqli_query($conexao, $sql);

if($result){
    header("location: $url");
}
?>