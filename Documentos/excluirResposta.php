<?php
include("../conecta.php");
$idResposta = $_GET['id'];
$url = $_SERVER['HTTP_REFERER'];
$sql = "DELETE FROM respostas WHERE id = '$idResposta'";
$query = mysqli_query($conexao, $sql);
if ($query) {
    header("location:$url");
}
