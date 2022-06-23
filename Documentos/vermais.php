
<?php
include "../conecta.php";

$id = $_GET['id'];

$sql = "SELECT * FROM documentos WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);

$documentos = mysqli_fetch_assoc($resultado);

$id = $documentos['id'];
$titulo = $documentos['titulo'];
$forma = $documentos['forma'];
$formato = $documentos['formato'];
$especie = $documentos['especie'];
$genero = $documentos['genero'];
$locali = $documentos['localizacao'];

$imagem = $documentos['imagem'];


?>
<style>
   li{
    font-size: 25px;
    padding:10px;
    
    
   }#lista{
    border-radius: 20px;
   }
</style>
<main>

<?php
include_once "../interfaces/header.php";
$sql2 = "SELECT id_topico FROM `tabela_assoc` WHERE `id_doc`= $documentos[id]";
$result = mysqli_query($conexao,$sql2);
$id_topicos = mysqli_fetch_all($result);

for($i = 0; $i < count($id_topicos); $i++){
 
    for($x = 0; $x < count($id_topicos[$i]); $x++){
    $y = $id_topicos[$i][$x];
    $sql3 = "SELECT * FROM `topicos` WHERE id=$y";
    $result = mysqli_query($conexao,$sql3);
    $topicos = mysqli_fetch_assoc($result);

    $topicos_doc[] = $topicos["titulo"];
    
    }

}   

//Fazendo Tabela de Informações do Documento 

echo "<br> <div id = 'lista' class = 'container collection'>";
if($documentos['imagem'] != ""){

    echo "<p> <img style = 'padding:20px;margin-left:10%;' class = 'materialboxed right' width = 500 src= '../upload/$imagem'> </p>";
    
    }else{
        echo "<p>" ."Sem Imagem"  . "</p>";
    
    }

echo "<li> Título do documento: ". $titulo . "</li><br>";
echo "<li>Forma: " .$forma  . "</li><br>";
echo "<li>Formato: " .$formato  . "</li><br>";
echo "<li>Espécie: " .$especie  . "</li><br>";
echo "<li>Localização: " .$locali  . "</li><br>";
echo "<li>Gênero: " .$genero  . "</li><br>";




echo "<li>Tópicos do documento: ";
foreach($topicos_doc as $chave => $topico){
    
   echo " <div class='chip'><a href = #> $topico </a> </div>";
}
echo "</li>";


mysqli_close($conexao);


?>

<br><br>



</main>
<br>
<?php include_once "../interfaces/footer.php"; ?>
</body>
</html>