<?php
include "../conecta.php";

$pegarid = "SELECT id FROM `documentos`";
$result = mysqli_query($conexao,$pegarid);
$ids = mysqli_fetch_all($result);
$id = max($ids);
$id_top = array_unique($_POST);
var_dump($id_top);
for($i = 1; $i < count($id_top); $i++){
$sql = "INSERT INTO `tabela_assoc`(id_doc,id_topico) VALUES ($id[0], $id_top[$i])";
$result = mysqli_query($conexao,$sql);


}

if($result){
    header("location:../Inicio/index.php");
}


