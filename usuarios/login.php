<?php
include("../conecta.php");

if($_POST['email'] != ""){
$sql = "SELECT * FROM user WHERE email= '$_POST[email]' LIMIT 1";
$result = mysqli_query($conexao,$sql);

$usuario = mysqli_fetch_assoc($result);
var_dump($usuario);
if(password_verify($_POST['senha'], $usuario['senha'])){
    if(!isset($_SESSION)){
        session_start();
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nvl_usuario'] = $usuario['tipoUsuario'];
        $_SESSION['foto'] = $usuario['foto'];
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['email_usuario'] = $usuario['email'];
        
        header("location:../Inicio/");
    }
}else{
    echo "Usuário não logado!";
}
}else{
    echo "Informe um email!";
}


