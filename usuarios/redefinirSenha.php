<?php
include('../conecta.php');
$token = $_GET['token'];

?>

<main>
    <?php include('../interfaces/header.php'); ?>

    <div class="container">
        <div class="col s6">
    <form action="resetpassword.php" method="post">
        
    <div class="input-field">
    <input type="password" name = "senha" id = "senha" class = "validate">
    <label for = "Senha">Insira a nova senha</label>
    </div>
    <div class="input-field">
    <input type="password" name = "repetirSenha" id = "repetirsenha" class = "validate">
    <label for = "repetirSenha">Confirme a senha</label>    
</div>
    <input type="hidden" value="<?= $token ?>" name="token">
    <button class = "btn waves-light blue darken-4" type="submit">Redefinir Senha</button>
    </form>
    </div>
    </div>
  
</main>


<?php include('../interfaces/footer.php');