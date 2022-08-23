<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../funcoes.php');
?>

<main>
    <?php include('../interfaces/header.php'); ?>
    <form action="excluirConta.php" method="post">
        <div class="container">

            <h5 class="red-text darken-4 center"> <?= exibeMensagens() ?> </h5>



            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input type="password" name="senha" id="senha" class="validate">
                        <label for="senha">Senha</label>
                        <span toggle="#senha" class="field-icon toggle-password "><span class="material-icons">visibility</span></span>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input type="password" id="repetirsenha" class="validate">
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