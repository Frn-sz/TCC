<?php include('puxandoUsuario.php'); ?>

<form action = "../usuarios/editar.php" method = "post" enctype = "multipart/form-data" class="col s12">
<div class="row">
  <div class="col offset-s6">
<img style = "border-radius:100%" width = "100" id = "blah"/>
</div>
</div>
   <div class="file-field input-field">
     <div class="btn blue darken-4">
    
       <span class = "iconeFoto"><i class = "material-icons">add_a_photo</i></span>
       <input id = "botao" type="file" name="foto" onchange="readURL(this);">
     </div>
     <div class="file-path-wrapper">
       <label for = "K">Escolha uma foto de perfil</label><input id = "k" class="file-path validate" type="text">
     </div>
   </div>
 
   <div class="row">
       <div class="input-field col s12">
         <input id = "nome" type = "text" name = "nome" value = "<?= $usuario['nome'] ?>" >
         <label for="nome">Nome</label>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s12">
         <input id = "email" type = "email" name = "email" class = "validate"  value = "<?= $usuario['email'] ?>">
         <label for="email">Email</label>
       </div>
     </div>
     <div class="row">
       <div class="center-align">
     <button class="btn-floating waves-effect waves-light blue darken-4" type="submit" name="action">
   <i class="material-icons right">check</i>
    </button>
    </div>
    </div>
  
   </form>
<script>
   function readURL(input) {

if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp").change(function(){
readURL(this);
});
</script>