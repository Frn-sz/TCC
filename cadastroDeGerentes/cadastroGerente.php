<?php

include "../conecta.php";
include ('../funcoes.php');
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
$resulset = mysqli_query($conexao,$sqlemail);
$verificacao = mysqli_fetch_assoc($resulset);
$url = $_SERVER['HTTP_REFERER'];
 
if($_POST['senha'] != ""){
if(is_null($verificacao)){
if($_FILES['foto']['error'] == 0){
$sql = "INSERT INTO `user`(nome, email, senha, foto, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', '$nome', 3)";
}else{
$sql = "INSERT INTO `user`(nome, email, senha, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', 3)";
}
var_dump($sql);
$resultado = mysqli_query($conexao,$sql);

if($resultado){
	header("location:$url");
}

}else{
	$_SESSION['mensagem'] = "E-mail já cadastrado";
	header("location:$url"	);
}}else{
	$_SESSION['mensagem'] = "Você deve inserir uma senha";
	header("location:$url"	);
}

?>