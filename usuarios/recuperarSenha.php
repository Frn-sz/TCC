<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
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
//'http://localhost/TCC/usuarios/redefinirSenha.php?token=$token'"
    //Gravar a data de expiração

    $sql2 = "INSERT INTO `passwordreset`(`email`, `token`, `dataExpiracao`, `tokenVerificacao`) VALUES ('$email','$token',\"" . $dataExpiracao -> format('Y-m-d H:i:s') . "\", 0)";
    $result2 = mysqli_query($conexao, $sql2);

    if(!$result2){
        die('Erro ao gravar no banco de dados' . mysqli_error($conexao));
    }else{
        $mail = new PHPMailer(true);

       try{
            $mail -> CharSet = "UTF-8";
            $mail -> Encoding = "base64";
            $mail -> setLanguage('br');
            $mail -> SMTPDebug = 2;
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail ->SMTPAuth = true;
            $mail -> Username = "fernando.2020316053@aluno.iffar.edu.br";
            $mail -> Password = "rkzcqwqxkvuaoxcw";
            $mail -> smtpSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail -> Port = "587";
            $mail -> isHTML(true);
            $mail -> setFrom('fernando.2020316053@aluno.iffar.edu.br', "Fernando Medeiros");
            $mail -> addAddress("$email");
            $mail -> Subject = "Redefinição de senha";
            $mail -> addReplyTo('fernando.2020316053@aluno.iffar.edu.br');
                $mail -> Body = "<h1> E-mail de recuperação de senha </h1> <p> Clique no link a seguir para redefinir sua senha: </p> <a href=". filter_input(INPUT_SERVER, 'SERVER_NAME') . "/TCC/usuarios/redefinirsenha.php?email=".$email . "&token=".$token.">Clique aqui</a>";
                if($mail -> send()){
                    $_SESSION['mensagem'] = "E-mail enviado com o link para redefinição de senha.";
                    var_dump($token);
                    header("Location:telalogin.php");
                }else{
                    $_SESSION['mensagem'] = "E-mail não foi enviado";
                }
        }catch(Exception $e){
                $_SESSION['mensagem'] = "A  mensagem não pode ser envaido" . $mail->ErrorInfo;
        }
        }
    }
   


?>