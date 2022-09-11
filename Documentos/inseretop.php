<?php
include "../conecta.php";

$pegarid = "SELECT idDoc FROM `documentos`";
$result = mysqli_query($conexao, $pegarid);
$ids = mysqli_fetch_all($result);
$id = max($ids);
$x = array_unique($_POST);
unset($x["action"]);
$id_top = array_values($x);
var_dump($id_top);
for ($i = 0; $i < count($id_top); $i++) {
    $sql = "INSERT INTO `tabela_assoc`(`id_doc`,`id_topico`) VALUES ('$id[0]', '$id_top[$i]')";
    $result = mysqli_query($conexao, $sql);
    echo  var_dump($sql) . "<br>";
}

if ($result) {
    header("location:../Inicio/");
}
