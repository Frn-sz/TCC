<?php

include('../conecta.php');

$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM user WHERE id  = '$id_usuario'";
$result = mysqli_query($conexao,$sql);
$usuario = mysqli_fetch_assoc($result);

?>