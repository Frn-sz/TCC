<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../funcoes.php');
?>
<style>
    input {
        color: white;
    }
</style>
<main>
    <?php include('../interfaces/header.php'); ?>
    <form action="excluirConta.php" method="post">
        <div class="container">

            <h4 class="center white-text"><?= exibeMensagens() ?></h4>



            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input type="password" name="senha" id="senha" class="validate" required>
                        <label for="senha">Senha</label>
                        <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input type="password" id="repetirsenha" class="validate" required>
                        <label for="repetirsenha">Confirme sua senha</label>
                        <span toggle="#repetirsenha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>
                        <span class="helper-text" data-error="Senhas não conferem"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="center">
                    <button type="submit" class="btn-large red darken-3">Excluir Conta</button>


                </div>
            </div>
        </div>
    </form>
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