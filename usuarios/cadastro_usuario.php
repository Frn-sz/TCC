<?php

include "../conecta.php";
include('../funcoes.php');
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION)) {
	//header("location:../Inicio/");
}
if (isset($_FILES['foto'])) {

	$ext = strrchr($_FILES['foto']['name'], '.');
	$nomeImagem = md5(time()) . $ext;
	$dir = "../upload/";
	move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $nomeImagem);
}

$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$sqlemail = "SELECT email FROM user WHERE email='$email'";
$resulset = mysqli_query($conexao, $sqlemail);
$verificacao = mysqli_fetch_assoc($resulset);
$url = $_SERVER['HTTP_REFERER'];

if ($_POST['senha'] != "") {
	if (is_null($verificacao)) {
		if ($_FILES['foto']['error'] == 0) {
			$sql = "INSERT INTO `user`(nome, email, senha, foto, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', '$nomeImagem', 2)";
		} else {

			$sql = "INSERT INTO `user`(nome, email, senha, foto, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', NULL, 2)";
		}
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado) {
			$_SESSION['id_usuario'] = mysqli_insert_id($conexao);
			$_SESSION['nvl_usuario'] = 2;
			if ($_FILES['foto']['error'] == 0) {
				$_SESSION['foto'] = $nomeImagem;
			} else {
				$_SESSION['foto'] = NULL;
			}

			$_SESSION['nome_usuario'] = $_POST['nome'];
			$_SESSION['email_usuario'] = $_POST['email'];
			header("location:cadastroAcesso.php");
		}
	} else {
		$_SESSION['mensagem'] = "E-mail já cadastrado";
		header("location:$url");
	}
} else {
	$_SESSION['mensagem'] = "Você deve inserir uma senha";
	header("location:$url");
}
