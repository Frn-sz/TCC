
<title>Lista de Tópicos</title>
<style>
#inserir{
     margin-left: 45%;
}
</style>
<script>

function confirmacao(id) {
     var resposta = confirm("Deseja remover este tópico?");
     if (resposta == true) {
          window.location.href = "excluirt.php?id="+id;
     }
}

</script>
 <main>
     <?php include_once "../conecta.php";
     require_once "../interfaces/header.php";
     include('../funcoes.php'); ?>
 <h5 class = "red-text darken-4 center"> <?= exibeMensagens() ?> </h5>
<?php


$sql = "SELECT * FROM `topicos`";
$result = mysqli_query($conexao, $sql);
echo "<br><div class = 'container'>";   
if(isset($_SESSION['id_usuario'])){
     if($_SESSION['nvl_usuario'] != 2){
echo "<a id = 'inserir' href='inseretopicos.php' class = 'btn-floating waves-effect grey darken-2'><i class = 'material-icons'> add </i> </a> <br>";
     }}
echo '<table class = "highlight grey darken-2 white-text">';

echo "<tr> <th> ID </th> <th> Título </th></tr> <br>";

$topicos = mysqli_fetch_all($result, MYSQLI_BOTH);

foreach($topicos as $chave => $topico){

     echo "<tr>";
     echo "<td>" . $topico['id']."</td  >";
     echo "<td>" . $topico['titulo'] ."</td>";
     
     if(isset($_SESSION['nvl_usuario'])){
          if($_SESSION['nvl_usuario'] != 2){
     echo "<td> <a class = 'btn-floating waves-effect grey darken-2' href='formalterat.php?id=$topico[id]'><i class = 'material-icons'> edit </i> </a>";
     echo "<td> <a class = 'btn-floating waves-effect grey darken-2' href='#'" . "onclick='confirmacao($topico[id])'><i class = 'material-icons'>" . "delete</i></a>" ;
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