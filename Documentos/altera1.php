
<?php

require_once "../conecta.php";
if (isset($_FILES['arquivo'])) {

    $ext = strrchr($_FILES['arquivo']['name'], '.');
    $nome = md5(time()) . $ext;
    $dir = "../upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $nome);
}
$id = $_POST['id'];
$idsTopicos = array($_POST[1], $_POST[2], $_POST[3], $_POST[4], $_POST[5]);
$titulo = $_POST['titulo'];
$forma = $_POST['forma'];
$formato = $_POST['formato'];
$especie = $_POST['especie'];
$genero = $_POST['genero'];
$localizacao = $_POST['localizacao'];
$imagem  = $nome;
$ApagandoAssociacoes = "DELETE FROM `tabela_assoc` WHERE id_doc = $id";
$result = mysqli_query($conexao, $ApagandoAssociacoes);

if ($_FILES['arquivo']['error'] == 0) {
    $sql = "UPDATE documentos SET tituloDoc='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao', imagem = '$imagem' WHERE idDoc=$id ";
} else {

    $sql = "UPDATE documentos SET tituloDoc='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao' WHERE idDoc=$id ";
}

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    foreach ($idsTopicos as $idTopico) {
        //Fazendo a associação de Topicos e Documentos na tabela associativa (tabela_assoc)
        if ($idTopico != 0) {
            $AssociandoDocTopicos = "INSERT INTO tabela_assoc (id_topico, id_doc) VALUES ('$idTopico', '$id')";
            $resultSet = mysqli_query($conexao, $AssociandoDocTopicos);
            if ($resultSet) {
                $erro = true;
            }
        }
    }

    header("location:../Inicio/index.php");
}



mysqli_close($conexao);




?>

