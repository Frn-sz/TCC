<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
include "../conecta.php";
$id = $_GET['id'];

$sql = "DELETE FROM biblioteca WHERE id=$id";
$resultado = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($resultado){
    header("Location:../Inicio/index.php");
}
?>
</body>
</html>