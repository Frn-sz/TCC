<?php
if (!isset($_SESSION)) {
    session_start();
}
$url = $_SERVER['HTTP_REFERER'];
$id_usuario = $_SESSION['id_usuario'];
$senhaCampo = $_POST['senha'];
include('../conecta.php');
$puxandoUsuario = "SELECT senha FROM user WHERE id='$id_usuario'";
$resultado = mysqli_query($conexao, $puxandoUsuario);
$senha = mysqli_fetch_assoc($resultado);
if (password_verify($senhaCampo, $senha['senha'])) {
    $sql = "DELETE FROM user WHERE id='$id_usuario'";
    $result = mysqli_query($conexao, $sql);
    $removerFavoritos = "DELETE FROM favoritos WHERE id_usuario='$id_usuario'";
    $resultSet = mysqli_query($conexao, $removerFavoritos);
    if ($result and $resultSet)
        session_destroy();
    unlink("../upload/" . $_SESSION['foto']);
    header("location:../Inicio/listaDocs.php");
} else {
    $_SESSION['mensagem'] = "Senha incorreta";
    header("Location:$url");
}
