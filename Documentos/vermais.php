<?php
include "../conecta.php";
if (!isset($_SESSION)) {
    session_start();
}
$id = $_GET['idDoc'];
$sql = "SELECT * FROM documentos WHERE idDoc='$id'";
$resultado = mysqli_query($conexao, $sql);
$documentos = mysqli_fetch_assoc($resultado);
$id = $documentos['idDoc'];
$titulo = $documentos['tituloDoc'];
$forma = $documentos['forma'];
$formato = $documentos['formato'];
$especie = $documentos['especie'];
$genero = $documentos['genero'];
$locali = $documentos['localizacao'];
$anoDoc = $documentos['anoDocumento'];
$plvsChaves = explode(" ", $documentos['plvsChaves']);
$imagem = $documentos['imagem'];
?>
<title><?= $titulo ?> </title>
<style>
    .docInfo {
        font-size: 25px;
        padding: 10px;
    }

    .caixaDocumento {
        background-color: rgba(255, 255, 255, 0.8) !important;
        border-radius: 25px;
    }

    .imagemDocumento {
        border-radius: 15px;
        border-style: solid;
        border-color: black;
    }

    .adicionarTranscricao {
        position: absolute;
        margin-top: -18.8%;
        margin-left: 12%;
        color: transparent !important;
        transition: 0.5s;
    }

    .adicionarTranscricao:hover {
        color: rgba(0, 0, 0, 0.8) !important;
        transition: 0.5s;
    }

    .Fav {
        color: rgba(0, 0, 0, 0) !important;
        font-weight: 600;
        background:
            linear-gradient(90deg, purple 50%, #000 0) var(--_p, 100%)/200% no-repeat !important;
        -webkit-background-clip: text !important;
        background-clip: text !important;
        transition: .4s !important;
    }

    .Fav:hover {
        --_p: 0% !important;
    }
</style>
<main>

    <?php
    include_once "../interfaces/header.php";
    include('../funcoes.php');
    if (isset($_SESSION['id_usuario'])) {
        $sqlfav = "SELECT id_documento FROM favoritos WHERE id_usuario = '$_SESSION[id_usuario]' and id_documento = '$id'";
        $resultfavs = mysqli_query($conexao, $sqlfav);
        $verificacaofavs = mysqli_fetch_assoc($resultfavs);

        if (is_null($verificacaofavs)) {
            $existe = false;
        } else {
            $existe = true;
        }
    }


    $sql2 = "SELECT id_topico FROM `tabela_assoc` WHERE `id_doc`= $documentos[idDoc]";
    $result = mysqli_query($conexao, $sql2);
    $id_topicos = mysqli_fetch_all($result);

    for ($i = 0; $i < count($id_topicos); $i++) {
        for ($x = 0; $x < count($id_topicos[$i]); $x++) {
            $y = $id_topicos[$i][$x];
            $sql3 = "SELECT * FROM `topicos` WHERE idTop=$y";
            $result = mysqli_query($conexao, $sql3);
            $topicos = mysqli_fetch_assoc($result);
            $topicos_doc[] = $topicos["tituloTop"];
        }
    }
    ?>
    <br><br>
    <div class="container caixaDocumento">

        <br>
        <div class='row'>
            <div class="col offset-s3">
                <?php if ($documentos['imagem'] != "") { ?>


                    <img class='materialboxed imagemDocumento' width=500 src='../upload/<?= $imagem ?>'>
                    <?php if ($_SESSION['nvl_usuario'] == 1) { ?>
                        <a href="addTranscricao.php" class="adicionarTranscricao"><i class="material-icons large">add</i></a>
                    <?php } ?>
                <?php } else { ?>

                    <div class='row'> Sem Imagem </div>

                <?php } ?>
            </div>
        </div>

        <div class='row'>
            <li class="docInfo"> Título do documento: <?= $titulo ?> </li>
        </div>
        <div class='row'>
            <li class="docInfo">Forma: <?= $forma  ?></li>
        </div>
        <div class='row'>
            <li class="docInfo">Formato: <?= $formato  ?></li>
        </div>
        <div class='row'>
            <li class="docInfo">Espécie: <?= $especie  ?></li>
        </div>
        <div class='row'>
            <li class="docInfo">Localização: <?= $locali  ?></li>
        </div>
        <div class='row'>
            <li class="docInfo">Gênero: <?= $genero  ?></li>
        </div>
        <div class='row'>
            <li class="docInfo">Ano do Documento: <?= $anoDoc  ?></li>
        </div>
        <div class="row">
            <div class="center">
                <?php foreach ($topicos_doc as $chave => $topico) { ?>
                    <div class='chip white'><a class="black-text" href=#> <?= $topico ?> </a> </div>
                    <?php }
                foreach ($plvsChaves as $plvChave) {
                    if (!$plvChave == "") { ?>
                        <div class='chip white'><a class="black-text" href=#> <?= $plvChave ?> </a> </div>
                <?php }
                } ?>
            </div>
        </div>
        <br>



        <?php if (isset($_SESSION['id_usuario']) and $existe == false) { ?>

            <form action="addfav.php" method="get">
                <div class="row">
                    <div class="center">
                        <input type="hidden" name="id" value=<?= $id ?>>
                        <button class="btn waves-effect waves-light Fav" type="submit"> Adicionar aos favoritos</button>
                    </div>
                </div>
            </form>
            <br>
        <?php } else if (isset($_SESSION['id_usuario']) and $existe == true) { ?>
            <form action="removerfavorito.php" method="get">
                <div class="row">
                    <div class="center">
                        <input type="hidden" name="id" value=<?= $id ?>>
                        <button class="btn waves-effect waves-light  Fav" type="submit">Remover dos favoritos</button>
                    </div>
                </div>

            </form>
            <br>
        <?php } ?>
    </div>
</main>
<?php include_once "../interfaces/footer.php"; ?>