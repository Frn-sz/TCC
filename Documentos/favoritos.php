<title>Favoritos</title>

<style>
  .card-image {
    height: 40vh !important;
    overflow: hidden !important;
    display: flex !important;
    align-items: flex-start !important;
  }

  a {
    color: white !important;
  }
</style>
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
            <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>">
              <div class='card hoverable'>
                <div class='card-image cardindex'>
                  <?php if (!is_null($documento['imagem'])) { ?>
                    <img class='imagem' src='../upload/<?= $documento['imagem'] ?>'>
                  <?php } else { ?>
                    <img class='imagem' src='../Imagens/placeholderSemImagem.png'>
                  <?php } ?>
                </div>
                <div class='card-content'>
                  <span class='card-title'><?= $documento['tituloDoc'] ?></span>
                  <p> Forma:<?= $documento['forma'] ?> <br></p>
                  <p> Formato:<?= $documento['formato'] ?> <br></p>
                  <p> Espécie:<?= $documento['especie']  ?></p>
                </div>
            </a>
            <div class='card-action center'>
              <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>
              <a class="btn-large white black-text" href="removerfavorito.php?id=<?= $documento['idDoc'] ?>">Remover favorito</a>
            </div>
          </div>
    </div>
    </a>
  <?php }
      } else { ?>
  <div class="center">
    <h4 class="white-text"> Não há nenhum favorito na sua lista </h4>
  </div>
<?php } ?>

  </div>
  </div>

</main>



<?php include('../interfaces/footer.php'); ?>