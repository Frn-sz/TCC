<?php
include_once('../conecta.php');
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$token = $_POST['token'];
$sql = "SELECT email FROM passwordReset WHERE token = '$token'";
$result = mysqli_query($conexao,$sql);
$email = mysqli_fetch_assoc($result);
var_dump($email);
$sql2 = "UPDATE user SET senha = '$senha' WHERE email='$email[email]'";
var_dump($sql2);
$result2 = mysqli_query($conexao,$sql2);

if($result2){
    header("location:../Inicio/");
}
