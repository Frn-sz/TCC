

<main>
<?php

include('../interfaces/header.php');

?>
<style>
   input{
    color: white;
   }input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  
  -webkit-text-fill-color: black !important;
  -webkit-box-shadow: 0 0 0px 1000px rgba(232,230,234,255) inset !important;
  transition: background-color 5000s ease-in-out 0s !important;
}.formRecupSenha{
    background-color: rgba(255,255,255,0.9);
}
</style>

<form action="recuperarSenha.php" method = "Post">
<div class="formRecupSenha">
    <div class="container">
        
<div class="input-field">
<input type = "email" name = "email">
<label for = "email">Email</label>
<div class="center">
<button type="submit" class="btn waves-light waves-effect white black-text">Solicitar recuperação de senha</button>

</div>
        </div>
    </div>
    </div>
</form>


</main>


<?php include('../interfaces/footer.php');?>

