<?php
$id_usuario = $_GET['id'];
include("../conecta.php");
$sql = "UPDATE user SET tipoUsuario=2 WHERE id='$id_usuario'";
$result = mysqli_query($conexao, $sql);
$url = $_SERVER['HTTP_REFERER'];
if($result)
header("location:$url");
?>