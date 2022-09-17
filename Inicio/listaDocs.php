<?php
if (!isset($_SESSION)) {
     session_start();
}
?>
<title>Lista de Documentos</title>
<style type="text/css">
     .paginacao,
     .paginacaoNum {
          color: black;
          background-color: white;
          padding: 7px;
          border-radius: 7px;
     }

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
     require_once "../interfaces/header.php";
     require_once "../conecta.php";

     //Definindo limite
     if (isset($_GET['pagina'])) {
          $pag = $_GET['pagina'];
     } else {
          $pag = 1;
     }
     $limit = 6;
     $offset = $limit * ($pag - 1);

     if (isset($_SESSION['id_usuario'])) {
          if ($_SESSION['nvl_usuario'] == 1 or $_SESSION['nvl_usuario'] == 3) {
     ?>
               <div class="row">
                    <div class="center">
                         <div><a id="inserir" class='waves-effect btn-floating white' href='../Documentos/insereform.php'><i class="material-icons black-text">add</i> </a></div>
                    </div>
               </div>
          <?php
          }
     }
     //Verificando se é uma pesquisa ou a listagem de todos os documentos

     if (isset($_GET['busca'])) {
          $pesquisa = "%" . mysqli_real_escape_string($conexao, trim($_GET['busca'])) . "%";
          $Busca =
               "SELECT DISTINCT idDoc FROM documentos AS F
          JOIN topicos AS D
          JOIN tabela_assoc AS T
          ON T.id_topico = D.idTop && F.idDoc = T.id_doc 
          WHERE D.tituloTop LIKE '$pesquisa' 
          OR F.tituloDoc LIKE '$pesquisa'
          OR F.transcricao LIKE '$pesquisa'
          OR F.palavrasChaves LIKE '$pesquisa'
          ORDER BY F.tituloDoc
          LIMIT $limit OFFSET $offset";
          //Fazendo a busca por título, Tópicos, Palavras chaves e transcricao
          $resultado = mysqli_query($conexao, $Busca);
          $QtndDocumentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
          $numRows = 0;
          foreach ($QtndDocumentos as $idDocumento) {
               $numRows++;
               $puxandoDocumentos = "SELECT * FROM documentos WHERE idDoc = '$idDocumento[idDoc]'";
               $sqlDocs = mysqli_query($conexao, $puxandoDocumentos);
               $documentos[] = mysqli_fetch_assoc($sqlDocs);
          }
          if ($numRows == 0) { ?>
               <div class="row">
                    <div class="center">
                         <h3 class="white-text">Nenhum resultado encontrado</h3>
                    </div>
               </div>

     <?php }
          $ultimaPag = ceil($numRows / $limit);
     } else {
          //Puxando todos os documentos do banco de dados
          $sqlTotal = "SELECT count(*) FROM `documentos` ORDER BY tituloDoc";
          $resultadoNum = mysqli_query($conexao, $sqlTotal);
          $numRows = mysqli_fetch_row($resultadoNum);
          $sql = "SELECT * FROM `documentos` ORDER BY tituloDoc LIMIT $limit OFFSET $offset";
          $resultado = mysqli_query($conexao, $sql);
          $documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
          $ultimaPag = ceil($numRows[0] / $limit);
     }

     $proximo = $pag + 1;
     $anterior = $pag - 1;
     ?>
     <div class='container'>
          <div class='row'>
               <?php
               if (isset($documentos)) {
                    foreach ($documentos as $chave => $documento) { ?>
                         <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>">
                              <div class="caixa">
                                   <div class='col s6 m4'>
                                        <div class='card hoverable'>
                                             <div class='card-image cardindex'>
                                                  <?php if ($documento['imagem'] != "") {  ?>
                                                       <img class='imagem' src='../upload/<?= $documento['imagem'] ?>'>
                                                  <?php } else { ?>
                                                       <div class='center'>
                                                            "Sem imagem"
                                                       </div>
                                                  <?php } ?>
                                             </div>
                                             <div class='card-content'>
                                                  <span class='card-title'><?= $documento['tituloDoc'] ?></span>
                                                  <p> Forma:<?= $documento['forma'] ?> <br></p>
                                                  <p> Formato:<?= $documento['formato'] ?> <br></p>
                                                  <p> Espécie:<?= $documento['especie']  ?></p>
                                             </div>
                                             <div class='card-action center'>

                                                  <?php if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) { ?>

                                                       <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>

                                                  <?php } else { ?>

                                                       <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>

                                                  <?php } ?>

                                                  <?php if (isset($_SESSION['nvl_usuario'])) {

                                                       if ($_SESSION['nvl_usuario'] != 2) { ?>

                                                            <a href='../Documentos/formaltera.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light  white'> <i class='material-icons black-text'>edit</i> </a>

                                                            <a class="waves-effect waves-light btn-floating modal-trigger white " href="#modal<?= $documento['idDoc'] ?>"><i class="material-icons black-text">delete</i></a>
                                                  <?php }
                                                  } ?>
                         </a>
          </div>
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
<?php    }
               } ?>
</div>
</div>
</div>
<div class="row">
     <div class="center">
          <ul class="pagination">
               <?php if ($pag == 1) { ?>
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
               <?php } else { ?>
                    <li class="waves-effect"><a href="listaDocs.php?pagina=<?= $anterior ?>"><i class="material-icons">chevron_left</i></a></li>
               <?php }
               for ($i = 1; $i <= $ultimaPag; $i++) { ?>
                    <li class="active white "><a class="black-text" href="listaDocs.php?pagina=<?= $i ?>"><?= $i ?></a></li>
               <?php }
               if ($pag < $ultimaPag) { ?>
                    <li class="waves-effect"><a href="listaDocs.php?pagina=<?= $proximo ?>"><i class="material-icons">chevron_right</i></a></li>
               <?php } else { ?>
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
               <?php } ?>
          </ul>
     </div>
</div>
</main>

<?php include_once "../interfaces/footer.php"; ?>

</html>