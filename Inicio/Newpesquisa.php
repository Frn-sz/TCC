<?php

if (!isset($_SESSION)) {
     session_start();
}
?>
<title>Resultado da Pesquisa</title>
<style>
     .paginacao,
     .paginacaoNum {
          color: black;
          background-color: white;
          padding: 7px;
          border-radius: 7px;
     }
</style>
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
          $pesquisa = "%" . mysqli_real_escape_string($conexao, trim($_GET['busca'])) . "%";
     } else {
          $pesquisa = "%%";
     }
     if (isset($_GET['pagina'])) {
          $pag = $_GET['pagina'];
     } else {
          $pag = 1;
     }
     $limit = 3;
     $offset = $limit * ($pag - 1);
     $BuscaTotal =
          "SELECT count(*) FROM documentos AS F
           INNER JOIN topicos As D
           INNER JOIN tabela_assoc As T 
           ON T.id_topico = D.idTop && F.idDoc = T.id_doc
           WHERE D.tituloTop LIKE '$pesquisa' 
           OR F.tituloDoc LIKE '$pesquisa'
           OR F.transcricao LIKE '$pesquisa'
           OR F.palavrasChaves LIKE '$pesquisa'
           ";
     $resultadoNum = mysqli_query($conexao, $BuscaTotal);
     $numRows = mysqli_fetch_row($resultadoNum);
     $Busca =
          "SELECT * FROM documentos AS F
           INNER JOIN topicos AS D
           INNER JOIN tabela_assoc AS T
           ON T.id_topico = D.idTop && F.idDoc = T.id_doc 
           WHERE D.tituloTop LIKE '$pesquisa' 
           OR F.tituloDoc LIKE '$pesquisa'
           OR F.transcricao LIKE '$pesquisa'
           OR F.palavrasChaves LIKE '$pesquisa'
           ORDER BY F.tituloDoc";

     //Fazendo a busca por título, Tópicos, Palavras chaves e transcricao
     $resultado = mysqli_query($conexao, $Busca);
     $documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
     $ultimaPag = ceil($numRows[0] / $limit);
     $proximo = $pag + 1;
     $anterior = $pag - 1;
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
                                             <a class="waves-effect waves-light btn-floating modal-trigger white " href="#modal<?= $documento['idDoc'] ?>"><i class="material-icons black-text">delete</i></a>
                                   <?php }
                                        } ?>
                                   </div>
                              </div>
                         </div>

                         <div id="modal<?= $documento['idDoc'] ?>" class="modal">
                              <div class="modal-content">
                                   <div class="row">
                                        <div class="center">
                                             <h4 class="black-text">Deseja mesmo excluir este documento?</h4>
                                        </div>
                                   </div>
                                   <form action="../Documentos/excluir.php" method="get">
                                        <div class="row">
                                             <div class="center">
                                                  <input type="hidden" name="idDoc" value="<?= $documento['idDoc']; ?>">
                                             </div>
                                        </div>
                                        <div class="center">
                                             <button type="submit" class="btn waves-effect waves-green white black-text">Confirmar</button>
                                             <a href="#!" class="modal-close waves-effect waves-red white btn black-text">Cancelar</a>
                                        </div>
                                   </form>
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
               if ($numRows[0] > 0) { ?>
     <div class="row">
          <div class="center">
               <ul class="pagination">
                    <?php if ($pag == 1) { ?>
                         <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <?php } else { ?>
                         <li class="waves-effect"><a href="Newpesquisa.php?pagina=<?= $anterior ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php }
                    for ($i = 1; $i <= $ultimaPag; $i++) { ?>
                         <li class="active white "><a class="black-text" href="Newpesquisa.php?pagina=<?= $i ?>"><?= $i ?></a></li>
                    <?php }
                    if ($pag < $ultimaPag) { ?>
                         <li class="waves-effect"><a href="Newpesquisa.php?pagina=<?= $proximo ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php } else { ?>
                         <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    <?php } ?>
               </ul>
          </div>
     </div>

<?php } ?>
</div>
</main>
<?php require_once "../interfaces/footer.php" ?>