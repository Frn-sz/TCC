<?php include('puxandoUsuario.php'); ?>

<form action = "../usuarios/editar.php" method = "post" enctype = "multipart/form-data" class="col s12">
   
   <div class="file-field input-field">
     <div class="btn blue darken-4">
       <span class = "iconeFoto"><i class = "material-icons">add_a_photo</i></span>
       <input type="file" name="foto" onchange="readURL(this);"><img id = "blah"/>
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
       <div class="col offset-s6">
     <button class="btn-floating waves-effect waves-light blue darken-4" type="submit" name="action">
   <i class="material-icons right">check</i>
    </button>
    </div>
    </div>
   </form>