<?php include('puxandoUsuario.php'); ?>

<form action="../usuarios/editar.php" method="post" enctype="multipart/form-data">
  <div class="row">

    <div class="center">
      <img width="500" id="blah" />
    </div>

  </div>
  <div class="file-field input-field">
    <div class="btn white">

      <span class="iconeFoto"><i class="material-icons black-text">add_a_photo</i></span>
      <input id="imgInp" type="file" name="foto" onchange="readURL(this);">
    </div>
    <div class="file-path-wrapper">
      <label class="black-text" for="K">Escolha uma foto de perfil</label><input id="k" class="file-path validate" type="text">
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <input id="nome" type="text" name="nome" value="<?= $usuario['nome'] ?>">
      <label class="black-text" for="nome">Nome</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s12">
      <input id="email" type="email" name="email" class="validate" value="<?= $usuario['email'] ?>">
      <label class="black-text" for="email">Email</label>
    </div>
  </div>
  <div class="row">
    <div class="center-align">
      <button class="btn-floating waves-effect waves-light white" type="submit" name="action">
        <i class="material-icons black-text">check</i>
      </button>
    </div>
  </div>

</form>

<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });
</script>