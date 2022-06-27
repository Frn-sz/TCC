

<?php
include "../conecta.php";




if(!isset($_SESSION)){
    session_start();
}
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
<title><?=$titulo?>    </title>
<style>
   li{
    font-size: 25px;
    padding:10px;
    
    
   }#lista{
    border-radius: 20px;
   }img{
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

echo "<br> <div id = 'lista' class = 'container '>";
if($documentos['imagem'] != ""){

    echo "<div class = 'row'> <div class = 'col offset-s4'> <img class = 'materialboxed right' width = 500 src= '../upload/$imagem'> </div></div>";
    
    
    }else{
        echo "<div class = 'row'>" ."Sem Imagem"  . "</div>";
    
    }

echo "<div class = 'row'> <li> Título do documento: ". $titulo . "</li> </div> ";
echo "<div class = 'row'> <li>Forma: " .$forma  . "</li></div> ";
echo "<div class = 'row'> <li>Formato: " .$formato  . "</li></div> ";
echo "<div class = 'row'> <li>Espécie: " .$especie  . "</li></div> ";
echo "<div class = 'row'> <li>Localização: " .$locali  . "</li></div> ";
echo "<div class = 'row'> <li>Gênero: " .$genero  . "</lri></div>   ";


echo "<li>Tópicos do documento: ";
foreach($topicos_doc as $chave => $topico){
    
   echo " <div class='chip'><a href = #> $topico </a> </div>";
}
echo "</li>";


mysqli_close($conexao);



?>

<?php if(isset($_SESSION['id_usuario'])){ ?>

<form action="addfav.php" method = "post">
    <div class="row">
        <div class="col offset-s5">
            <input type = "hidden" name = "id" value = <?= $id ?>>
<button class = "btn waves-effect waves-light blue darken-4" type="submit"><i class = "material-icons">star</i> Adicionar aos favoritos</button>
</div>
</div>
</form>

<?php } ?>

</main>
<br>
<?php include_once "../interfaces/footer.php"; ?>
</body>


'; ?>