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

        padding: 15px;
    }

    input,
    textarea,
    select,
    option {
        color: white !important;
    }
</style>
<main>
    <?php include('../interfaces/header.php'); ?>
    <div class="container">
        <div class="row  formRedefine">
            <form action="resetpassword.php" method="post">
                <div class="input-field">
                    <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons white-text">visibility</span></span>
                    <input type="password" name="senha" id="senha" class="validate" required>
                    <label for="senha">Insira a nova senha</label>
                </div>
                <div class="input-field">
                    <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons white-text">visibility</span></span>
                    <input type="password" name="repetirSenha" id="repetirsenha" class="validate" required>
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


<?php include('../interfaces/footer.php'); ?>

<script>
    let senha = document.getElementById('senha');
    let senhaC = document.getElementById('repetirsenha');

    function validarSenha() {
        if (senha.value != senhaC.value) {
            senhaC.setCustomValidity(" ");
            senhaC.reportValidity();
            return false;
            senhaC.addEventListener('input', validarSenha);
            senha.addEventListener('blur', validarSenha);
        } else {
            senhaC.setCustomValidity("");
            return true;

        }

    }
    // verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
    senhaC.addEventListener('input', validarSenha);
    senha.addEventListener('blur', validarSenha);
</script>