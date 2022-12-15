<?php

include('../conecta.php');

if (!isset($_SESSION)) {
    session_start();
}
$sql = "SELECT * FROM user WHERE id = '$_SESSION[id_usuario]'";
$result = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($result);

$_SESSION['nvl_usuario'] = $usuario['tipoUsuario'];
$_SESSION['foto'] = $usuario['foto'];
$_SESSION['nome_usuario'] = $usuario['nome'];
$_SESSION['email_usuario'] = $usuario['email'];

if ($result) {
    header("Location:../Inicio/listaDocs.php");
}
