<?php

include "../conecta.php";

if(isset($_FILES['foto'])){

	$ext = strrchr($_FILES['foto']['name'], '.');
	$nome = md5(time()).$ext;
	$dir = "../upload/";

	move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$nome);

}
var_dump($_FILES);
$senha = md5($_POST['senha']);
if($_FILES['foto']['error'] == 0){
$sql = "INSERT INTO `user`(nome, email, senha, foto, nivelacesso) VALUES ('$_POST[nome]','$_POST[email]', '$senha', '$nome', 1)";
}else{
$sql = "INSERT INTO `user`(nome, email, senha, nivelacesso) VALUES ('$_POST[nome]','$_POST[email]', '$senha', 1)";
}
$resultado = mysqli_query($conexao,$sql);

if($resultado){
    header("Location:listausers.php");
}

?>