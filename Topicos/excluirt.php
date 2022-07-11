
<?php
include "../conecta.php";
$id = $_GET['id'];
if(!isset($_SESSION)){
    session_start();
}
$sqlVerificar = "SELECT * FROM tabela_assoc WHERE id_topico = '$id'";
$resultado = mysqli_query($conexao,$sqlVerificar);
$existe = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
var_dump($existe);

if(!isset($existe[0]['id_tabela'])){
$sql = "DELETE FROM topicos WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);
if($resultado){
    header("Location:topicos.php");
}}else{
    $_SESSION['mensagem'] = "Tópico presente em algum documento. Não é possível exclui-lo.";
    header("Location:topicos.php");
}
?>
