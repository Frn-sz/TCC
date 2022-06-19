
<title>Resultado da Pesquisa</title>

<script>
//Função que faz um pop-up na tela pra confirmar a exclusão de um documento.
function confirmacao(id) {
     var resposta = confirm("Deseja remover este documento?");
     if (resposta == true) {
          window.location.href = "../Documentos/excluir.php?id="+id;
     }
}
</script>
</head>

 <body>

<main>
<?php

if($_GET['busca'] == ""){

    header("location:index.php");
}


$pesquisa = "%". trim($_GET['busca']) . "%";

echo $pesquisa;


require_once "../conecta.php";
require_once "../interfaces/header.php";



$sql = "SELECT * FROM `topicos` WHERE `titulo` LIKE '$pesquisa'";
$resultado = mysqli_query($conexao, $sql);
$topicos = mysqli_fetch_all($resultado,MYSQLI_BOTH);

$documentos[0] = 0; 
foreach($topicos as $chave => $topico){
     $sql2 = "SELECT id_doc FROM `tabela_assoc`WHERE  id_topico = $topico[id]";
     $result = mysqli_query($conexao,$sql2);
     $ids = mysqli_fetch_all($result, MYSQLI_ASSOC);
     for($i = 0; $i < count($ids); $i++){
          $idsearch = $ids[$i]['id_doc'];
          $sql3 = "SELECT id FROM `documentos` WHERE id = '$idsearch'";
          $search = mysqli_query($conexao,$sql3);
          $documentos[$i] = mysqli_fetch_assoc($search);
          
     }
}

foreach($documentos as $chave => $documento){
     $id = $documento['id'];
     $sql4 = $sql3 = "SELECT * FROM `documentos` WHERE id = '$id'";
     $resultados = mysqli_query($conexao,$sql4);
     $busca[] = mysqli_fetch_all($resultados, MYSQLI_BOTH);
     
}

echo '<table id = "documentos" class = "container " border = 2>';

echo "<tr><thead>  <th> Imagem </th><th> Nome do Documento </th> <th> Forma </th> <th> Formato </th> <th> Especie </th>  <th colspan = 4> Operações </th> </tr> <thead> <tdbody><br>";

for($i = 0; $i < count($busca);$i++){
foreach($busca[$i] as $chave => $documento){

$id = $documento['id'];

     if($documento['imagem'] != ""){ 
          
     echo "<td> <img width = 250 src = ../upload/" . $documento['imagem'] . "></td>";

}    else{
     
     echo "<td>Sem Imagem</td>";

}
     echo "<td>" . $documento['titulo']. "</td>";
     echo "<td>" . $documento['forma'] . "</td>";
     echo "<td>" . $documento['formato'] . "</td>";
     echo "<td>" . $documento['especie'] . "</td>";
     
   
   
     echo "<td class =''> <a href = '../Documentos/vermais.php?id=$id' class = 'btn-floating waves-effect waves-light  blue darken-4 '><i class ='material-icons'>search</i>  </a>";
     echo "<td class =''> <a href= '../Documentos/formaltera.php?id=$id' class = 'btn-floating waves-effect waves-light  blue darken-4'> <i class ='material-icons'>edit</i>  </a>";
     echo "<td class =''> <a href='#'" . "onclick='confirmacao($id)' class = 'btn-floating waves-effect waves-light blue darken-4'>  <i class = 'material-icons'>" . "delete </i> </a>" ;
     echo "<a href='inicio.html' class ='voltar'>";
     echo "</tr>";
   
   
}}

     echo "<tdbody> </table>";
    
?>






</main>
<?php require_once "../interfaces/footer.php" ?>
</body>     
</html>