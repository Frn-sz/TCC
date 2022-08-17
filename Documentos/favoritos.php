<title>Favoritos</title>


<main>

  <?php
  include('puxandofavoritos.php');
  include('../interfaces/header.php');
  ?>
  <br>
  <div class='container'>
    <div class='row'>

      <?php
      if (isset($documentos)) {
        foreach ($documentos as $chave => $documento) { ?>


          <div class='col s2 m4'>
            <div class='card hoverable'>
              <div class='card-image cardindex'>

                <?php if ($documento['imagem'] != "") {  ?>

                  <img class='materialboxed imagem' src='../upload/<?= $documento['imagem'] ?>'>
                <?php } else { ?>
                  <div class='center'>
                    "Sem imagem"
                  </div>
                <?php } ?>


              </div>
              <div class='card-content'>
                <span class='card-title'><?= $documento['titulo'] ?></span>
                <p> Forma:<?= $documento['forma'] ?> <br></p>
                <p> Formato:<?= $documento['formato'] ?> <br></p>
                <p> Espécie:<?= $documento['especie']  ?></p>
              </div>
              <div class='card-action center'>

                <a href='../Documentos/vermais.php?id=<?= $documento['id'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>



                <a class="btn-large white black-text" href="removerfavorito.php?id=<?= $documento['id'] ?>">Remover favorito</a>



              </div>
            </div>
          </div>


        <?php    }
      } else { ?>
        <div class="center">
          <h4 class="white-text"> Não há nenhuma favorito na sua lista </h4>
        </div>
      <?php } ?>

    </div>
  </div>

</main>



<?php include('../interfaces/footer.php'); ?>