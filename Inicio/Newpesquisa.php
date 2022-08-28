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
               window.location.href = "../Documentos/excluir.php?idDoc=" + id;
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
     $totalDeResultados = "2";
     if (!isset($_GET['pagina'])) {
          $pgNum = 1;
     } else {
          $pgNum =  $_GET['pagina'];
     }
     $inicio = $pgNum - 1;
     $inicio = $inicio * $totalDeResultados;
     $Busca =
          "SELECT * FROM documentos AS F
           INNER JOIN topicos As D
           INNER JOIN tabela_assoc As T 
           ON T.id_topico = D.idTop && F.idDoc = T.id_doc
           WHERE D.tituloTop LIKE '$pesquisa' 
           OR F.tituloDoc LIKE '$pesquisa'
           OR F.plvsChaves LIKE '$pesquisa'
           OR F.transcricao LIKE '$pesquisa'
           ORDER BY F.tituloDoc
           LIMIT $inicio, $totalDeResultados";
     var_dump($Busca);
     ?> <a style="color:white"> </a>
     <?php
     //Fazendo a busca por título e Tópicos e Palavras chaves
     $resultado = mysqli_query($conexao, $Busca);
     $linhas = mysqli_num_rows($resultado);
     $numeroDePaginas = $linhas / $totalDeResultados;

     $documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
     $proximo = $pgNum + 1;
     $anterior = $pgNum - 1;


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
                                             <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text''>search</i>  </a>
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

<?php }
               var_dump($numeroDePaginas);
               die;
               if ($pgNum > 1) {

                    echo $_GET['busca']; ?>

     <a href="Newpesquisa.php?pagina=<?= $anterior ?>&busca=<?= $_GET['busca'] ?>">
          <- Anterior</a>

          <?php }
               if ($pgNum < $numeroDePaginas) { ?>

               <a href="Newpesquisa.php?pagina=<?= $proximo ?>">
                    Próxima -> </a>
          <?php } ?>
</main>
<?php require_once "../interfaces/footer.php" ?>