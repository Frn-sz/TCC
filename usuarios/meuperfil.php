<?php

include('../conecta.php');

if(!isset($_SESSION)){
    session_start();
}
include('puxandoUsuario.php');

?>
<style>
    .imagemPerfil{
        border-radius: 100%;
    }#blah{
        border-radius: 100%;
    }.modal-content{
        width: 120%px;
    }
</style>

<body>

<?php include('../interfaces/header.php'); ?>
<main>
<br>
<div class="row">
    <div class="col offset-s4">
    <img class = "imagemPerfil" width = 300 src = "../upload/<?=$usuario['foto'] ?>">
    </div>
    </div>
    <div class="row">
        <div class="col offset-s6">
    <a class="waves-effect waves-light btn modal-trigger blue darken-4" href="#modal1">Editar perfil</a>
    </div>
    </div>
  <div id="modal1" class="modal">
    <div class="modal-content">
    
    <?php include('formEditUsuario.php');?>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
    </div>
  </div>

    </div>

</main>
</body>

<?php include('../interfaces/footer.php'); ?>

<!--
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>-->