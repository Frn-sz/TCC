<?php
include('../conecta.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_FILES['foto'])){

	$ext = strrchr($_FILES['foto']['name'], '.');
	$nomeImagem = md5(time()).$ext;
	$dir = "../upload/";

	move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$nomeImagem);

}


$nomeUsuario = $_POST['nome'];
$email = $_POST['email'];
$id = $_SESSION['id_usuario'];

if($_FILES['foto']['error'] == 0){
$sql = "UPDATE user SET nome = '$nomeUsuario', email = '$email', foto = '$nomeImagem' WHERE id = $id";
}else{
    $sql = "UPDATE user SET nome = '$nomeUsuario', email = '$email' WHERE id = $id";
}

$result = mysqli_query($conexao, $sql);
$url = $_SERVER['HTTP_REFERER'];
if($result){
    header("location:$url");
    $_SESSION['email_usuario'] = $email;
    $_SESSION['nome_usuario'] = $nomeUsuario;
    if($_FILES['foto']['error'] == 0){
    $_SESSION['foto'] = $nomeImagem;
    }
}
?>