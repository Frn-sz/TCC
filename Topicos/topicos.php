<title>Lista de Tópicos</title>
<style>
     #inserir {
          margin-left: 45%;
     }

     .tabelaTopicos {
          color: black;
          background-color: rgba(255, 255, 255, 0.8);
          border-radius: 10px;
     }
</style>
<script>
     function confirmacao(id) {
          var resposta = confirm("Deseja remover este tópico?");
          if (resposta == true) {
               window.location.href = "excluirt.php?id=" + id;
          }
     }
</script>
<main>
     <?php include_once "../conecta.php";
     require_once "../interfaces/header.php";
     include('../funcoes.php'); ?>
     <h5 class="red-text darken-4 center"> <?= exibeMensagens() ?> </h5>
     <?php


     $sql = "SELECT * FROM `topicos`";
     $result = mysqli_query($conexao, $sql);
     echo "<br><div class = 'container'>";
     if (isset($_SESSION['id_usuario'])) {
          if ($_SESSION['nvl_usuario'] != 2) {
               echo "<a id = 'inserir' href='inseretopicos.php' class = 'btn-floating waves-effect'><i class = 'material-icons black-text white'> add </i> </a> <br>";
          }
     }
     echo '<table class = "highlight tabelaTopicos">';

     echo "<tr> <th class = 'center'> ID </th> <th class = 'center' > Título </th></tr> <br>";

     $topicos = mysqli_fetch_all($result, MYSQLI_BOTH);

     foreach ($topicos as $chave => $topico) {

          echo "<tr>";
          echo "<td class = 'center'>" . $topico['idTop'] . "</td  >";
          echo "<td class = 'center'>" . $topico['tituloTop'] . "</td>";

          if (isset($_SESSION['nvl_usuario'])) {
               if ($_SESSION['nvl_usuario'] != 2) {
                    echo "<td> <a class = 'btn-floating  waves-effect' href='formalterat.php?id=$topico[idTop]'><i class = 'material-icons black-text white'> edit </i> </a>";
                    echo "<td> <a class = 'btn-floating waves-effect' href='#'" . "onclick='confirmacao($topico[idTop])'><i class = 'material-icons black-text white'>" . "delete</i></a>";
               }
          }
          echo "</tr>";
     }

     echo "</table>";



     echo "</div>";


     echo "<a href='inicio.html' class ='voltar'>";
     ?>


</main>
<?php require_once "../interfaces/footer.php"; ?>
</body>

</html>