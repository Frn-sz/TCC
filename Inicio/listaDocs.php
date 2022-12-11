<?php
if (!isset($_SESSION)) {
     session_start();
}
?>
<title>Lista de Documentos</title>
<style type="text/css">
     .card-title {
          display: flex !important;
          overflow: hidden !important;
          text-overflow: ellipsis !important;
          white-space: nowrap !important;
     }

     .card-image {
          height: 30vh !important;
          overflow: hidden !important;
          display: flex !important;
          align-items: flex-start !important;
          padding: 2px;

     }

     a {
          color: white !important;
     }

     .topicosEncontrados {
          color: white;
          text-align: center;
     }

     .aTopicos,
     .aDocumentos {
          color: white !important;
          padding: 10px;
          font-size: 20px;
          border-radius: 5px;
     }

     div.gallery {
          margin: 5px;
          border: 1px solid #ccc;
          width: 180px;
          color: white;
     }

     div.gallery:hover {
          border: 1px solid #777;
     }

     div.gallery img {
          width: 100%;
          height: auto;
     }

     div.desc {
          padding: 15px;
          text-align: center;
     }

     .tituloTop {
          color: white;
          margin: auto;
          text-align: center;
     }

     .teste1 {
          display: flex;
          flex-direction: column;
     }

     .nenhumTopico {
          text-align: center;
          color: white;
     }

     .listaDocumentosTopicos {
          list-style: none !important;
          display: inline-block !important;
     }

     .botaoSelecionado {
          background-color: rgba(255, 255, 255, 0.2);
     }
</style>
<main>
     <?php
     require_once "../interfaces/header.php";
     ?>
     <?php
     require_once "../conecta.php";
     require("../funcoes.php");
     if (isset($_GET['escolha'])) {
          $escolha  = $_GET['escolha'];
     } else {
          $escolha = "todos";
     }
     //Definindo limite
     if (isset($_GET['pagina'])) {
          $pag = $_GET['pagina'];
     } else {
          $pag = 1;
     }
     $limit = 8;
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
          $BuscaDocumentos = "SELECT * FROM documentos AS D
          WHERE D.tituloDoc LIKE '$pesquisa'
          OR D.transcricao LIKE '$pesquisa'
          OR D.palavrasChaves LIKE '$pesquisa'";
          $resultado = mysqli_query($conexao, $BuscaDocumentos);
          $documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
          $numRows = count($documentos);
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

     if ($escolha != "todos") {
          ?>
          <div>
               <div class="center">
                    <?php if ($escolha == "topicos") { ?>
                         <a class="aTopicos botaoSelecionado" href="listaDocs.php?busca=<?= $_GET['busca'] ?>&&escolha=topicos" ">Tópicos</a>
                         <a class=" aDocumentos" href="listaDocs.php?busca=<?= $_GET['busca'] ?>&&escolha=documentos'">Documentos</a>
                    <?php } else { ?>
                         <a class="aTopicos" href="listaDocs.php?busca=<?= $_GET['busca'] ?>&&escolha=topicos">Tópicos</a>
                         <a class="aDocumentos botaoSelecionado" href="listaDocs.php?busca=<?= $_GET['busca'] ?>&&escolha=documentos'">Documentos</a>
                    <?php } ?>
               </div>
               <br>
          </div>
          <?php }
     if ($escolha != "topicos") {
          if ($numRows == 0) { ?>
               <div class="row">
                    <div class="center">
                         <?php $nenhum = True; ?>
                         <h3 class="white-text">Nenhum documento encontrado</h3>
                    </div>
               </div>
          <?php }
          ?>
          <div class='container'>
               <div class='row'>
                    <?php
                    if (isset($documentos)) {
                         foreach ($documentos as $chave => $documento) { ?>
                              <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>">
                                   <div class="caixa">
                                        <div class='col s6 m3'>
                                             <div class='card hoverable'>
                                                  <div class='card-image cardindex'>
                                                       <?php if ($documento['imagem'] != "") {  ?>
                                                            <img class='imagem' src='../upload/<?= $documento['imagem'] ?>'>
                                                       <?php } else { ?>
                                                            <img class='imagem' src='../Imagens/placeholderSemImagem.png'>
                                                       <?php } ?>
                                                  </div>
                                                  <div class='card-content'>
                                                       <span class='card-title'><?= $documento['tituloDoc'] ?></span>
                                                       <p> Forma: <?= $documento['forma'] ?> <br></p>
                                                       <p> Formato: <?= $documento['formato'] ?> <br></p>
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
                                                                 &nbsp
                                                                 <a href='../Documentos/formaltera.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light  white'> <i class='material-icons black-text'>edit</i> </a>
                                                                 &nbsp
                                                                 <a class="waves-effect waves-light btn-floating modal-trigger white " href="#modal<?= $documento['idDoc'] ?>"><i class="material-icons black-text">delete</i></a>
                                                       <?php }
                                                       } ?>
                                                  </div>
                                             </div>
                                        </div>
                              </a>
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
          <div class="center row">

               <ul class="pagination">
                    <?php
                    if (!isset($nenhum)) {
                         if ($pag == 1) {
                    ?>
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
                    <?php }
                    } ?>
               </ul>

          </div>
          </div>
     <?php } else { ?>

     <?php buscaTopicos($_GET['busca']);
     } ?>



</main>

<?php include_once "../interfaces/footer.php"; ?>
<script>
     $(document).ready(function() {
          $('.collapsible').collapsible();
     });
</script>
<script>
     $('.tabs').tabs('methodName');
     $('.tabs').tabs('methodName', paramName);
</script>