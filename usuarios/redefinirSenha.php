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
<style>
    .formRedefine {
        background-color: rgba(255, 255, 255, 0.9) !important;
        padding: 15px;
    }

    label {
        color: black !important;
    }
</style>
<main>
    <?php include('../interfaces/header.php'); ?>
    <div class="container">
        <div class="row  formRedefine">
            <form action="resetpassword.php" method="post">
                <div class="input-field">
                    <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons black-text">visibility</span></span>
                    <input type="password" name="senha" id="senha" class="validate">
                    <label for="senha">Insira a nova senha</label>
                </div>
                <div class="input-field">
                    <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons black-text">visibility</span></span>
                    <input type="password" name="repetirSenha" id="repetirsenha" class="validate">
                    <label for="repetirSenha">Confirme a senha</label>
                    <span class="helper-text" data-error="Senhas não conferem"></span>
                </div>
                <input type="hidden" value="<?= $token ?>" name="token">
                <input type="hidden" value="<?= $email ?>" name="email">
                <div class="row">
                    <div class="center">
                        <button class="btn waves-light white black-text" type="submit">Redefinir Senha</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</main>


<?php include('../interfaces/footer.php');
