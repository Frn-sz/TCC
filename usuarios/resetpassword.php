<?php
include_once('../conecta.php');
if(!isset($_SESSION)){
    session_start();
}
$token = $_POST['token'];
$email = $_POST['email'];

$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$sql2 = "UPDATE user SET senha = '$senha' WHERE email='$email'";
$result2 = mysqli_query($conexao,$sql2);

if($result2){
    $_SESSION['mensagem'] = "Senha alterada com sucesso";
    header("location:telalogin.php");
}
