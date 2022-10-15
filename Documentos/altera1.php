
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
$titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
$forma = mysqli_real_escape_string($conexao, $_POST['forma']);
$formato = mysqli_real_escape_string($conexao, $_POST['formato']);
$especie = mysqli_real_escape_string($conexao, $_POST['especie']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
$localizacao = mysqli_real_escape_string($conexao, $_POST['localizacao']);
$imagem  = mysqli_real_escape_string($conexao, $nome);
$palavrasChaves = mysqli_real_escape_string($conexao, $_POST['plvChaves']);
$ApagandoAssociacoes = "DELETE FROM `tabela_assoc` WHERE id_doc = '$id'";
$result = mysqli_query($conexao, $ApagandoAssociacoes);


if ($_FILES['arquivo']['error'] == 0) {
    $sql = "UPDATE documentos SET tituloDoc='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao', imagem = '$imagem', palavrasChaves = '$palavrasChaves' WHERE idDoc=$id ";
} else {
    $sql = "UPDATE documentos SET tituloDoc='$titulo',forma='$forma',formato='$formato',especie='$especie',genero='$genero',localizacao='$localizacao', palavrasChaves = '$palavrasChaves' WHERE idDoc=$id ";
}

$resultado = mysqli_query($conexao, $sql);

// var_dump($sql);
// die();
if ($resultado) {
    //Fazendo a associação de Topicos e Documentos na tabela associativa (tabela_assoc)
    foreach ($idsTopicos as $idTopico) {
        //Fazendo a associação de Topicos e Documentos na tabela associativa (tabela_assoc)
        if ($idTopico != 0) {
            $AssociandoDocTopicos = "INSERT INTO tabela_assoc (id_topico, id_doc) VALUES ('$idTopico', '$id')";
            $resultSet = mysqli_query($conexao, $AssociandoDocTopicos);
            var_dump($AssociandoDocTopicos);
            if (!$resultSet) {
                $erro = True;
            }
        } else {
            $AssociandoDocTopicos = "INSERT INTO tabela_assoc (id_topico, id_doc) VALUES ('33', '$id')";
            $resultSet = mysqli_query($conexao, $AssociandoDocTopicos);
            if (!$resultSet) {
                $erro = True;
            }
        }
    }

    if ($erro == False) {
        header("location:../Inicio/listaDocs.php");
    }
}

header("location:../Inicio/listaDocs.php");




mysqli_close($conexao);




?>

