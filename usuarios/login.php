<?php
include("../conecta.php");


$sql = "SELECT * FROM user WHERE email= '$_POST[email]' LIMIT 1";
$result = mysqli_query($conexao,$sql);

$usuario = mysqli_fetch_assoc($result);

if(password_verify($_POST['senha'], $usuario['senha'])){
    echo "Usuário logado!";
}else{
    echo "Usuário não logado!";
}

