<?php

include "../conecta.php";
if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION)){
	//header("location:../Inicio/");
}
if(isset($_FILES['foto'])){

	$ext = strrchr($_FILES['foto']['name'], '.');
	$nome = md5(time()).$ext;
	$dir = "../upload/";

	move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$nome);

}

$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$sqlemail = "SELECT email FROM user WHERE email='$email'";
$resultSet = mysqli_query($conexao, $sqlemail);
$verificacao = mysqli_fetch_assoc($resultSet);
 

if(is_null($verificacao)){
if($_FILES['foto']['error'] == 0){
$sql = "INSERT INTO `user`(nome, email, senha, foto, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', '$nome', 2)";
}else{
$sql = "INSERT INTO `user`(nome, email, senha, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', 2)";
}
var_dump($sql);
$resultado = mysqli_query($conexao,$sql);



if($resultado){
$_SESSION['id_usuario'] = mysqli_insert_id($conexao);

header("location:cadastroAcesso.php");
}

}else{
	die("E-mail já cadastrado");
}
?>