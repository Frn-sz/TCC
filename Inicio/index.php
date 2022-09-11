<?php

if (!isset($_SESSION)) {
     session_start();
}
?>
<title>Lista de Documentos</title>


<script>
     //Função que faz um pop-up na tela pra confirmar a exclusão de um documento.
     function confirmacao(id) {
          var resposta = confirm("Deseja remover este documento?");
          if (resposta == true) {
               window.location.href = "../Documentos/excluir.php?id=" + id;
          }
     }
</script>

<style type="text/css">
     #inserir {
          margin-left: 50%;
     }

     .card-content {
          background-color: rgba(0, 0, 0, 0.8) !important;
     }

     .paginacao,
     .paginacaoNum {
          color: black;
          background-color: white;
          padding: 7px;
          border-radius: 7px;
     }
</style>
<main>

     <?php
     require_once "../interfaces/header.php"; ?>
     <br>
     <?php
     require_once "../conecta.php";

     if (isset($_SESSION['id_usuario'])) {
          if ($_SESSION['nvl_usuario'] == 1 or $_SESSION['nvl_usuario'] == 3) {
     ?>
               <div><a id="inserir" class='waves-effect btn-floating white' href='../Documentos/insereform.php'><i class="material-icons black-text">add</i> </a></div>
               <br>

     <?php

          }
     }

     //Realizando o comando select para puxar os documentos do Banco de dados
     if (isset($_GET['pagina'])) {
          $pag = $_GET['pagina'];
     } else {
          $pag = 1;
     }
     $limit = 3;
     $offset = $limit * ($pag - 1);
     $sqlTotal = "SELECT count(*) FROM `documentos` ORDER BY tituloDoc";
     $resultadoNum = mysqli_query($conexao, $sqlTotal);
     $numRows = mysqli_fetch_row($resultadoNum);
     $sql = "SELECT * FROM `documentos` ORDER BY tituloDoc LIMIT $limit OFFSET $offset";
     $resultado = mysqli_query($conexao, $sql);
     $documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
     $ultimaPag = ceil($numRows[0] / $limit);
     $proximo = $pag + 1;
     $anterior = $pag - 1;
     ?>
     <br>
     <div class='container'>
          <div class='row'>

               <?php foreach ($documentos as $chave => $documento) { ?>

                    <div class="caixa">
                         <div class='col s2 m4'>
                              <div class='card hoverable zoom'>
                                   <div class='card-image cardindex'>

                                        <?php if ($documento['imagem'] != "") {  ?>

                                             <img class='imagem ' src='../upload/<?= $documento['imagem'] ?>'>
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






               <?php    } ?>
          </div>
     </div>
     </div>

     <div class="row">
          <div class="center">
               <ul class="pagination">
                    <?php if ($pag == 1) { ?>
                         <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <?php } else { ?>
                         <li class="waves-effect"><a href="index.php?pagina=<?= $anterior ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php }
                    for ($i = 1; $i <= $ultimaPag; $i++) { ?>
                         <li class="active white "><a class="black-text" href="index.php?pagina=<?= $i ?>"><?= $i ?></a></li>
                    <?php }
                    if ($pag < $ultimaPag) { ?>
                         <li class="waves-effect"><a href="index.php?pagina=<?= $proximo ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php } else { ?>
                         <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    <?php } ?>
               </ul>
          </div>
     </div>


</main>

<?php include_once "../interfaces/footer.php"; ?>

</html>