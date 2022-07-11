<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require_once '../conecta.php';
$email = $_POST['email'];

$sql = "SELECT email FROM user WHERE email = '$email'";
$result = mysqli_query($conexao,$sql);
$usuario = mysqli_fetch_assoc($result);
if(is_null($usuario)){
    die('E-mail não existe');
    $_SESSION['mensagem'] = "E-mail não existe";
}else{
    $token = bin2hex(random_bytes(50));
    $dataExpiracao = new DateTime();
    $dataExpiracao -> add(new DateInterval("P1D"));

    //Gravar a data de expiração

    $sql2 = "INSERT INTO `passwordreset`(`email`, `token`, `dataExpiracao`) VALUES ('$email','$token',\"" . $dataExpiracao -> format('Y-m-d H:i:s') . "\")";
    $result2 = mysqli_query($conexao, $sql2);

    if(!$result2){
        die('Erro ao gravar no banco de dados' . mysqli_error($conexao));
    }else{
        $mail = new PHPMailer(true);

        
            $mail -> CharSet = "UTF-8";
            $mail -> Encoding = "base64";
            $mail -> setLanguage('br');
            $mail -> SMTPDebug = false;
            $mail -> isSMTP();
            $mail -> isHTML(true);
            $mail -> Host = 'smtp.gmail.com';
            $mail ->SMTPAuth = true;
            $mail -> Username = "fernando.2020316053@aluno.iffar.edu.br";
            $mail -> Password = "Twister tempo 23";
            $mail -> smtpSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail -> Port = "587";
            $mail -> setFrom('fernando.2020316053@aluno.iffar.edu.br', "Fernando Medeiros");
            $mail -> addAddress("$email");
            $mail -> Body = "<h1> E-mail de recuperação de senha </h1> Clique no link a seguir para redefinir sua senha 'http://localhost/TCC/usuarios/redefinirSenha.php?token=$token'";
            if($mail -> send())
                $_SESSION['mensagem'] = "Senha alterada com sucesso";
                header("location:telalogin.php");
            
            
    }
}


?>