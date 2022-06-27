<?php



if(!isset($_SESSION)){
    session_start();
}

include('../conecta.php');
$id = $_SESSION['id_usuario'];

$sql = "SELECT id_documento FROM favoritos WHERE id_usuario = $id";
$resultado = mysqli_query($conexao,$sql);

$id_documentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);



foreach($id_documentos as $chave => $id){

    $sql2 = "SELECT * FROM documentos WHERE id = $id[id_documento]";
    $result2 = mysqli_query($conexao, $sql2);
    $documentos[] = mysqli_fetch_assoc($result2);

}

?>