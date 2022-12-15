<!DOCTYPE html>
<title>Lista de Tópicos</title>
<script>
     function confirmacao(id) {
          var resposta = confirm("Deseja remover este tópico?");
          if (resposta == true) {
               window.location.href = "excluirt.php?id=" + id;
          }
     }
</script>
<style>
     table,
     tr,
     td {
          border: none !important;
     }

     .LinkTopico {
          text-decoration: none;
          font-size: large;
     }

     .aviso {
          padding: 10px;
          border-radius: 10px;
          font-weight: bold;

     }

     body {
          color: white !important;
     }

     .btn-floating {
          vertical-align: top !important;
     }
</style>
<?php

include_once "../conecta.php";
require_once "../interfaces/header.php";
include('../funcoes.php');
if (isset($_SESSION['id_usuario']) && $_SESSION['nvl_usuario'] != 2) {
     $adm = True;
} else {
     $adm = False;
}
$sql = "SELECT * FROM `topicos`";
$result = mysqli_query($conexao, $sql);
$topicos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<main>

     <?php if (isset($_SESSION['id_usuario'])) {
          if ($_SESSION['nvl_usuario'] != 2) { ?>
               <div class="row">
                    <div class="center">
                         <a id='inserir' href='inseretopicos.php' class='btn-floating waves-effect'><i class='material-icons black-text white'> add </i> </a> <br>
                    </div>
               </div>

     <?php  }
     } ?>
     <br>

     <h4 class="center white-text"><?= exibeMensagens() ?></h4>
     <br>
     <span class="aviso">Obs: Clique nos assuntos para ver os documentos de cada um.</span>

     <br><br>

     <table class="TabelaTopicos ">
          <thead>
               <th class="center">Assuntos</th>
               <?php if ($adm) { ?>
                    <th class="center" colspan="4">Operações</th>
               <?php } ?>
          </thead>
          <tbody>
               <?php foreach ($topicos as $topico) {
                    if ($topico['tituloTop'] != "-") { ?>
                         <tr>
                              <td class="center"><a class="white-text LinkTopico" href=" ../Documentos/buscaTopicos.php?idTopico=<?= $topico['idTop'] ?>"><?= $topico['tituloTop'] ?></a></td>
                              <?php if ($adm) { ?>
                                   <td class="center"><a class="btn-floating aedit white" href="formalterat.php?idTop=<?= $topico['idTop'] ?>"><i class="material-icons black-text">edit</a>
                                        &nbsp <a class="btn-floating  adelete white modal-trigger" href="#modal<?= $topico['idTop'] ?>"><i class="material-icons     black-text">delete</a>
                                   </td>
                                   <div id="modal<?= $topico['idTop'] ?>" class="modal">
                                        <div class="modal-content">
                                             <div class="row">
                                                  <div class="center">
                                                       <h4 class="black-text">Deseja mesmo excluir este tópico?</h4>
                                                  </div>
                                             </div>
                                             <form action="excluirt.php" method="get">
                                                  <div class="row">
                                                       <div class="center">
                                                            <input type="hidden" name="idTop" value="<?= $topico['idTop']; ?>">
                                                       </div>
                                                  </div>
                                                  <div class="center">
                                                       <button type="submit" class="btn waves-effect waves-green white black-text">Confirmar</button>
                                                       <a href="#!" class="modal-close btn waves-effect waves-red white black-text">Cancelar</a>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              <?php } ?>
                         </tr>
               <?php
                    }
               } ?>
          </tbody>
     </table>


</main>
<?php require_once "../interfaces/footer.php"; ?>
</body>

</html>