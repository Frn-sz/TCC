<?php

if (!isset($_SESSION)) {
     session_start();
}
?>
<title>Resultado da Pesquisa</title>
<script>
     //Função que faz um pop-up na tela pra confirmar a exclusão de um documento.
     function confirmacao(id) {
          var resposta = confirm("Deseja remover este documento?");
          if (resposta == true) {
               window.location.href = "../Documentos/excluir.php?id=" + id;
          }
     }
</script>
</head>
<main>
     <?php
     include('../conecta.php');
     include('../interfaces/header.php');
     if (isset($_GET['busca'])) {
          $pesquisa = "%" . trim($_GET['busca']) . "%";
     } else {
          $pesquisa = "%%";
     }
     $Busca =
          "SELECT * FROM documentos AS F
          INNER JOIN tabela_assoc As T 
          INNER JOIN topicos As D 
          WHERE D.tituloTop LIKE '$pesquisa' 
          OR F.tituloDoc LIKE '$pesquisa'
          OR F.plvsChaves LIKE '$pesquisa'
          ORDER BY F.tituloDoc
          LIMIT 20";
     //Fazendo a busca por título e Tópicos e Palavras chaves
     $resultado = mysqli_query($conexao, $Busca);
     $documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
     ?>
     <div class='container'>
          <div class='row'>
               <?php
               if (!is_null($documentos)) {
                    foreach ($documentos as $chave => $documento) { ?>
                         <div class='col s2 m4'>
                              <div class='card hoverable'>
                                   <div class='card-image cardpesquisa'>
                                        <?php if ($documento['imagem'] != "") {  ?>
                                             <img class='imagem' src='../upload/<?= $documento['imagem'] ?>'>
                                        <?php } else { ?>
                                             <div class='center'>
                                                  Sem imagem
                                             </div>
                                        <?php } ?>

                                        <span class='card-title white-text'><?= $documento['tituloDoc'] ?></span>
                                   </div>
                                   <div class='card-content'>
                                        <p> Forma:<?= $documento['forma'] ?><br></p>
                                        <p> Formato:<?= $documento['formato'] ?> <br></p>
                                        <p> Espécie: <?= $documento['especie'] ?></p>
                                   </div>
                                   <div class='card-action center'>
                                        <?php if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) { ?>
                                             <a href='../Documentos/vermais.php?id=<?= $documento['id'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text''>search</i>  </a>
              <?php }
                                        if (isset($_SESSION['nvl_usuario'])) {
                                             if ($_SESSION['nvl_usuario'] == 1) { ?>
               <a href = ' ../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>
                                             <a href='../Documentos/formaltera.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light white'> <i class='material-icons black-text'>edit</i> </a>
                                             <a href='#' onclick='confirmacao($documento[idDoc])' class='btn-floating waves-effect waves-light white'> <i class='material-icons black-text'> delete </i> </a>
                                   <?php }
                                        } ?>
                                   </div>
                              </div>
                         </div>


                    <?php } ?>
          </div>
     </div>
<?php } else { ?>
     <div class="row">
          <div class="col offset-s2">
               <h3 class="white-text"> Não foram encontrados resultado </h3>
          </div>
     </div>

<?php } ?>



</main>
<?php require_once "../interfaces/footer.php" ?>