

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
<button type="submit" class="btn waves-light waves-effect blue darken-4">Solicitar recuperação de senha</button>
</form>
</div>
</div>
</main>


<?php include('../interfaces/footer.php');?>

