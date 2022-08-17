
<?php

require_once "../conecta.php";
if (isset($_FILES['arquivo'])) {

    $ext = strrchr($_FILES['arquivo']['name'], '.');
    $nome = md5(time()) . $ext;
    $dir = "../upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $nome);
}
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$forma = $_POST['forma'];
$formato = $_POST['formato'];
$especie = $_POST['especie'];
$genero = $_POST['genero'];
$localizacao = $_POST['localizacao'];
$imagem  = $nome;


if ($_FILES['arquivo']['error'] == 0) {

    $sql = "UPDATE documentos SET titulo='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao', imagem = '$imagem' WHERE id=$id ";
} else {

    $sql = "UPDATE documentos SET titulo='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao' WHERE id=$id ";
}

$resultado = mysqli_query($conexao, $sql);

$sql2 = "DELETE FROM `tabela_assoc` WHERE id_doc = $id";
$result = mysqli_query($conexao, $sql2);

for ($i = 0; $i < 5; $i++) {
    $id_top[$i] = $_POST[$i];
}
foreach ($id_top as $chave => $idx) {
    $array[] = $idx;
    $id_topico = array_unique($array);
}

foreach ($id_topico as $chave => $id_topicox) {

    $sql2 = "INSERT INTO `tabela_assoc`(id_doc,id_topico) VALUES ('$id', '$id_topicox')";
    $resultado2 = mysqli_query($conexao, $sql2);
}

if ($resultado and $resultado2) {
    header("location:../Inicio/");
}

mysqli_close($conexao);




?>

