<?php

include("../conecta.php");
if (!isset($_SESSION)) {
    session_start();
}
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
if ($_POST['email'] != "") {
    $sql = "SELECT * FROM user WHERE email= '$email' LIMIT 1";
    $result = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_assoc($result);

    if (password_verify($senha, $usuario['senha'])) {

        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nvl_usuario'] = $usuario['tipoUsuario'];
        $_SESSION['foto'] = $usuario['foto'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['email_usuario'] = $usuario['email'];

        header("location:../Inicio/listaDocs.php");
    } else {

        $_SESSION['mensagem'] = "Credenciais incorretas";
        header("location:telalogin.php");
    }
}
