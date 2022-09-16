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
     .collection {
          border-radius: 15px !important;
          background-color: white;

     }

     .TabelaTopicos {
          background-color: rgba(255, 255, 255, 0.8);
          border-top-right-radius: 15px;
          border-top-left-radius: 15px;

     }

     .LinkTopico {
          text-decoration: underline;
     }

     .aviso {
          padding: 10px;
          border-radius: 10px;
          font-weight: bold;
          background-color: rgba(255, 255, 255, 0.8);
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
     <h5 class="red-text darken-4 center"> <?= exibeMensagens() ?> </h5>
     <br><br><br>
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
     <div class="container">
          <span class="aviso">Obs: Clique nos assuntos para ver os documentos de cada um.</span>
     </div>
     <br>
     <div class="container">
          <table class="striped TabelaTopicos">
               <thead>
                    <th class="center">Assuntos</th>
                    <?php if ($adm) { ?>
                         <th class="center" colspan="4">Operações</th>
                    <?php } ?>
               </thead>
               <tbody>
                    <?php foreach ($topicos as $topico) {
                         if ($topico['tituloTop'] != "PlaceHolderSystem") { ?>
                              <tr>
                                   <td class="center"><a class="linkAssunto black-text LinkTopico" href=" ../Inicio/Newpesquisa.php?busca=<?= $topico['tituloTop'] ?>"><?= $topico['tituloTop'] ?></a></td>
                                   <?php if ($adm) { ?>
                                        <td class="center"><a class="btn-floating small white" href="formalterat.php?idTop=<?= $topico['idTop'] ?>"><i class="material-icons black-text">edit</a>
                                             &nbsp <a class="btn-floating small white" href="excluirt.php?idTop=<?= $topico['idTop'] ?>"><i class="material-icons black-text ">delete</a>
                                        </td>
                                   <?php } ?>
                              </tr>
                    <?php
                         }
                    } ?>
               </tbody>
          </table>
     </div>

</main>
<?php require_once "../interfaces/footer.php"; ?>
</body>

</html>