<?php

include "../conecta.php";

if(isset($_FILES['foto'])){

	$ext = strrchr($_FILES['foto']['name'], '.');
	$nome = md5(time()).$ext;
	$dir = "../upload/";

	move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$nome);

}


$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

if($_FILES['foto']['error'] == 0){
$sql = "INSERT INTO `user`(nome, email, senha, foto, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', '$nome', 2)";
}else{
$sql = "INSERT INTO `user`(nome, email, senha, tipoUsuario) VALUES ('$_POST[nome]','$_POST[email]', '$senha', 2)";
}
$resultado = mysqli_query($conexao,$sql);

if($resultado){
    header("Location:listausers.php");
}

?>