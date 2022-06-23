
<?php

include "../conecta.php";

$sql = "SELECT * FROM `user`";
$result = mysqli_query($conexao,$sql);

$usuarios = mysqli_fetch_all($result, MYSQLI_BOTH);

?>



<title>Lista de Usuários</title>

<body>
     <main>
    <?php include "../interfaces/header.php";?>

    <br>

    <div><a id = "botaoinsere" class = 'waves-effect btn-floating blue darken-4' href = '../usuarios/cadastrouser.php'><i class = "material-icons">add</i> </a></div>
    <?php 
    echo '<table id = "documentos" class = "container " border = 2>';

echo "<tr><thead>  <th> Imagem </th><th> Nome </th> <th> Email </th>  <th colspan = 4> Operações </th> </tr> <thead> <tdbody><br>";


     foreach($usuarios as $chave => $usuario){
     echo "<tr>";
     if($usuario['foto'] != ""){ 
          
     echo "<td> <img width = 250 src = ../upload/" . $usuario['foto'] . "></td>";

}    else{
     
     echo "<td>Sem Imagem</td>";

}
     echo "<td>" . $usuario['nome']. "</td>";
     echo "<td>" . $usuario['email'] . "</td>";

     
   
   
    // echo "<td class =''> <a href = '../Documentos/vermais.php?id=$usuario[id]' class = 'btn-floating waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>";
     
    // echo "<td class =''> <a href='#'" . "onclick='confirmacao($usuario[id])' class = 'btn-floating waves-effect waves-light blue darken-4'>  <i class = 'material-icons'>" . "delete </i> </a>" ;
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}

     echo "<tdbody> </table>";
?>
</main>
</body>

<?php require_once "../interfaces/footer.php"; ?>
