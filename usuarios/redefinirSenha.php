<?php
include('../conecta.php');
if (!isset($_SESSION)) {
    session_start();
}
$token = $_GET['token'];
$email = $_GET['email'];
$verificacaoToken = "SELECT * FROM passwordreset WHERE email='$email' AND token='$token' ";
$resultado = mysqli_query($conexao, $verificacaoToken);
$passwordReset = mysqli_fetch_assoc($resultado);

if (is_null($passwordReset)) {
    $_SESSION['mensagem'] = "Token inválido";
    //header("location:telalogin.php");
} else {
    $hoje = new DateTime();
    $dataExpiracao = new DateTime($passwordReset['dataExpiracao']);

    if ($hoje > $dataExpiracao) {
        $_SESSION['mensagem'] = "Token expirado, favor solicitar outro.";
        header("location:telalogin.php");
    } else {
        if ($passwordReset['tokenVerificacao'] != 0) {
            $_SESSION['mensagem'] = "Token já utilizado, favor solicitar outro.";
            header("location:telalogin.php");
        }
    }
}
?>

<main>
    <?php include('../interfaces/header.php'); ?>

    <div class="container">
        <div class="col s6">
            <form action="resetpassword.php" method="post">

                <div class="input-field">
                    <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
                    <input type="password" name="senha" id="senha" class="validate">
                    <label for="senha">Insira a nova senha</label>
                </div>
                <div class="input-field">
                    <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
                    <input type="password" name="repetirSenha" id="repetirsenha" class="validate">
                    <label for="repetirSenha">Confirme a senha</label>
                    <span class="helper-text" data-error="Senhas não conferem"></span>
                </div>
                <input type="hidden" value="<?= $token ?>" name="token">
                <input type="hidden" value="<?= $email ?>" name="email">
                <button class="btn waves-light grey darken-1" type="submit">Redefinir Senha</button>
            </form>
        </div>
    </div>

</main>


<?php include('../interfaces/footer.php');
