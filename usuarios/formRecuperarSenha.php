

<main>
<?php

include('../interfaces/header.php');

?>

<form action="recuperarSenha.php" method = "Post">
    <div class="container">
        <div class="col s6">
<div class="input-field">
<input type = "email" name = "email">
<label for = "email">Email</label>
<div class="center">
<button type="submit" class="btn waves-light waves-effect grey darken-1">Solicitar recuperação de senha</button>
</div>
</form>
</div>
</div>
</main>


<?php include('../interfaces/footer.php');?>

