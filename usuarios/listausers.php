
<?php

include "../conecta.php";

$sql = "SELECT * FROM `user`";
$result = mysqli_query($conexao,$sql);

$usuarios = mysqli_fetch_all($result, MYSQLI_BOTH);

?>



<title>Lista de Usuários</title>

     <main>
    <?php include "../interfaces/header.php";?>

    <br>

    <div><a id = "botaoinsere" class = 'waves-effect btn-floating blue darken-4' href = '../usuarios/cadastrouser.php'><i class = "material-icons">add</i> </a></div>
    <?php 
    echo '<table id = "documentos" class = "container " border = 2>';

echo "<tr><thead>  <th> Imagem </th><th> Nome </th> <th> Email </th> <thead> <tdbody><br>";


     foreach($usuarios as $chave => $usuario){
     echo "<tr>";
     if($usuario['foto'] != ""){ 
          
     echo "<td> <img width = 200 src = ../upload/" . $usuario['foto'] . "></td>";

}    else{
     
     echo "<td>Sem Imagem</td>";

}
     echo "<td>" . $usuario['nome']. "</td>";
     echo "<td>" . $usuario['email'] . "</td>";
     if($usuario['tipoUsuario'] == 2){
     echo "<td><a class='btn-large blue darken-4' href='elevarAGerente.php?id=$usuario[id]'>Elevar a gerente</a></td>";
     }else if($usuario['tipoUsuario'] == 3){
          echo "<td><a class='btn-large blue darken-4 shref='rebaixarGerente.php?id=$usuario[id]'>Rebaixar gerente</a></td>";  
     }else{
          echo "<td>Administrador</td>  ";
     }
     
   
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}

     echo "<tdbody> </table>";
?>
</main>


<?php require_once "../interfaces/footer.php"; ?>
