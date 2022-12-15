<?php
if (!isset($_SESSION)) {
     session_start();
}
include "../conecta.php";
$sql = "SELECT * FROM `user`";
$result = mysqli_query($conexao, $sql);
$usuarios = mysqli_fetch_all($result, MYSQLI_BOTH);
if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] != "1") {
     header("location:../Inicio/listaDocs");
}
?>
<title>Lista de Usuários</title>
<style>
     .tabelaUsuarios {
          border-radius: 10px;
          color: white;
     }

     .imagemUsuarios {
          border: solid 1.5px;
          border-color: rgba(102, 51, 153, 1);
          margin-left: 20%;
          border-radius: 5%;
     }

     .buttonListaUser {
          color: white !important;
          font-weight: 600;
          background:
               linear-gradient(90deg, purple 50%, #000 0) var(--_p, 100%)/200% no-repeat !important;
          -webkit-background-clip: text !important;
          background-clip: text !important;
          transition: .4s !important;
     }

     .buttonListaUser:hover {
          --_p: 0% !important;
     }
</style>
<main>
     <?php include "../interfaces/header.php"; ?>

     <br>


     <table class="container tabelaUsuarios">
          <div class="espaco">
               <tr>
                    <thead>
                         <th class="center"> Imagem </th>
                         <th class="center"> Nome </th>
                         <th class="center"> Email </th>
                         <thead>
                              <tdbody><br>


                                   <?php foreach ($usuarios as $chave => $usuario) {
                                   ?>
                                        <tr>
                                             <?php if ($usuario['foto'] != NULL) { ?>

                                                  <td> <img class='materialboxed imagemUsuarios' width=200 src=../upload/<?= $usuario['foto'] ?>></td>

                                             <?php } else { ?>

                                                  <td><img class='imagemUsuarios materialboxed' width=200 src='../Imagens/semImagem.jpg'></td>

                                             <?php } ?>
                                             <td style="padding: 41px;" class="center"><?= $usuario['nome'] ?></td>
                                             <td class="center"><?= $usuario['email'] ?></td>
                                             <?php if ($usuario['tipoUsuario'] == 2) { ?>
                                                  <td class="center"><a class='btn buttonListaUser modal-trigger' href="#modal<?= $usuario['id'] ?>">Excluir Usuário</a>
                                                       <a class='btn buttonListaUser' href='elevarAGerente.php?id=<?= $usuario['id'] ?>'>Elevar a gerente</a>
                                                  </td>
                                             <?php } else if ($usuario['tipoUsuario'] == 3) { ?>
                                                  <td class="center"><a class='btn buttonListaUser modal-trigger' href="#modal<?= $usuario['id'] ?>">Excluir Usuário</a>
                                                       <a class='btn buttonListaUser' href='rebaixarGerente.php?id=<?= $usuario['id'] ?>'>Rebaixar gerente</a>
                                                  </td>
                                             <?php } else { ?>
                                                  <td class="center"><a class="btn buttonListaUser" href="#">Administrador</a></td>
                                             <?php } ?>

                                        </tr>


                                   <?php } ?>

                                   <tdbody>

     </table>

     <?php foreach ($usuarios as $chave => $usuario) { ?>
          <div id="modal<?= $usuario['id'] ?>" class="modal">
               <div class="modal-content">
                    <div class="row">
                         <div class="center">
                              <h4 class="black-text">Deseja mesmo excluir este usuário?</h4>
                         </div>
                    </div>
                    <form action="excluirContaADM.php" method="get">
                         <div class="row">
                              <div class="center">
                                   <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
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

</main>

<br>

<?php require_once "../interfaces/footer.php"; ?>