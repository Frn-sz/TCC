<?php
include_once('../conecta.php');
if (!isset($_SESSION)) {
    session_start();
}
$token = $_POST['token'];
$email = $_POST['email'];
$verificacaoToken = "SELECT * FROM passwordreset WHERE email='$email' AND token='$token' ";
$resultado = mysqli_query($conexao, $verificacaoToken);
$passwordReset = mysqli_fetch_assoc($resultado);
$hoje = new DateTime();
$dataExpiracao = new DateTime($passwordReset['dataExpiracao']);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
if ($hoje > $dataExpiracao) {
    $_SESSION['mensagem'] = "Token expirado, favor solicitar outro.";
    header("location:telalogin.php");
} else {
    if ($passwordReset['tokenVerificacao'] != 0) {
        $_SESSION['mensagem'] = "Token já utilizado, favor solicitar outro.";
        header("location:telalogin.php");
    } else {
        $sql2 = "UPDATE user SET senha = '$senha' WHERE email='$email'";
        $result2 = mysqli_query($conexao, $sql2);
        $sql3 = "UPDATE passwordreset SET tokenVerificacao = 1 WHERE email='$email' and token = '$token'";
        $result3 = mysqli_query($conexao, $sql3);
        if ($result2 and $result3) {
            $_SESSION['mensagem'] = "Senha alterada com sucesso";
            header("location:telalogin.php");
        } else {
            $_SESSION['mensagem'] = "Erro ao gravar senha no banco";
            header("location:telalogin.php");
        }
    }
}
