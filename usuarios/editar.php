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



$id = $_SESSION['id_usuario'];
$nomeUsuario = $_POST['nome'];
$email = $_POST['email'];
$sqlemail = "SELECT email FROM user WHERE id != '$id'";
$resulset = mysqli_query($conexao,$sqlemail);
$emails = mysqli_fetch_all($resulset, MYSQLI_ASSOC);
$verificacao = false;

foreach($emails as $key => $emailx){
    echo $emailx['email'] . "<br>";
    if($emailx['email'] == $email){
        $verificacao = true;
      
    }
}

$url = $_SERVER['HTTP_REFERER'];

if($verificacao == false){

if($_FILES['foto']['error'] == 0){

$sql = "UPDATE user SET nome = '$nomeUsuario', email = '$email', foto = '$nomeImagem' WHERE id = $id";

}else{

    $sql = "UPDATE user SET nome = '$nomeUsuario', email = '$email' WHERE id = $id";

}

$result = mysqli_query($conexao, $sql);
if($result){
    header("location:$url");
    $_SESSION['email_usuario'] = $email;
    $_SESSION['nome_usuario'] = $nomeUsuario;
    if($_FILES['foto']['error'] == 0){
    $_SESSION['foto'] = $nomeImagem;
    }
    
}}else if ($verificacao == true){
    header("location:$url");
}
