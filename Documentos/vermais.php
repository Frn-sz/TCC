<?php
include "../conecta.php";
if (!isset($_SESSION)) {
    session_start();
}
$id = $_GET['idDoc'];
$sql = "SELECT * FROM documentos WHERE idDoc='$id'";
$resultado = mysqli_query($conexao, $sql);
$documentos = mysqli_fetch_assoc($resultado);
$titulo = $documentos['tituloDoc'];
$forma = $documentos['forma'];
$formato = $documentos['formato'];
$especie = $documentos['especie'];
$genero = $documentos['genero'];
$locali = $documentos['localizacao'];
$anoDoc = $documentos['anoDocumento'];
$plvsChaves = explode(" ", $documentos['plvsChaves']);
$transcricao = $documentos['transcricao'];
$imagem = $documentos['imagem'];

?>
<title><?= $titulo ?></title>
<style>
    .docInfo {
        font-size: 25px;
        padding: 10px;
    }

    .caixaDocumento {
        background-color: rgba(255, 255, 255, 0.8) !important;
        border-radius: 25px;
    }

    .material-placeholder {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;

    }

    .imagemDocumento {
        border-radius: 15px;
        border-style: solid;
        border-color: black;
        display: block !important;

    }

    .adicionarTranscricao {
        position: relative;
        margin-top: -15%;
        margin-left: 10% !important;
        color: transparent !important;
        transition: 0.5s !important;
    }

    .Transcricao:hover {
        color: rgba(0, 0, 0, 0.8) !important;
        transition: 0.5s;
    }

    .Fav,
    .botaoModal,
    .botaoTrans {
        color: rgba(0, 0, 0, 0) !important;
        font-weight: 600;
        background:
            linear-gradient(90deg, purple 50%, #000 0) var(--_p, 100%)/200% no-repeat !important;
        -webkit-background-clip: text !important;
        background-clip: text !important;
        transition: .4s !important;
    }

    .Fav:hover,
    .botaoModal:hover,
    .botaoTrans:hover {
        --_p: 0% !important;
    }

    .SemImagem {
        font-weight: bold;

    }
</style>
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
$pegandoTopicos = "SELECT tituloTop FROM topicos INNER JOIN tabela_assoc AS T ON T.id_doc = '$id' WHERE idTop = T.id_topico";
$resultSet = mysqli_query($conexao, $pegandoTopicos);
$topicos = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);
?>
<main>
    <br><br><br><br>

    <div class="container caixaDocumento">
        <?php if ($documentos['imagem'] != "") { ?>
            <div class="row">
                <div class="center">
                    <a class="adicionarTranscricao"> <img class='materialboxed imagemDocumento' width=500 src='../upload/<?= $imagem ?>'></a>
                </div>
            </div>
        <?php $existeImagem = 1;
        } else { ?>
            <div class="row">
                <div class="center">
                    <br><br>
                    <span class="SemImagem"> Sem Imagem </span>
                </div>
            </div>
        <?php $existeImagem = 0;
        } ?>
        <?php if (isset($_SESSION['id_usuario']) && $_SESSION['nvl_usuario'] != 2) {
            if ($existeImagem == 1) { ?>
                <div class="row">
                    <div class="center">
                        <br>
                        <a class="waves-effect waves-light btn modal-trigger botaoTrans" href="addTranscricao.php?auto=1&&idDoc=<?= $documentos['idDoc'] ?>">Transcrição Automática</a>
                        <a class="waves-effect waves-light btn modal-trigger botaoTrans" href="addTranscricao.php?auto=0&&idDoc=<?= $documentos['idDoc'] ?>">Transcrição Manual</a>
                    </div>
                </div>
            <?php }
        }
        if ($existeImagem == 1) { ?>

            <div class="row">
                <div class="center">
                    <a class="waves-effect waves-light btn modal-trigger botaoModal" href="#modalDoc">Mostrar transcrição</a>
                </div>
            </div>
        <?php } ?>

        <ul>
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
        </ul>
        <div class="row">
            <div class="center">
                <?php
                foreach ($topicos as $chave => $topico) { ?>
                    <div class='chip white'><a class="black-text" href=#> <?= $topico['tituloTop'] ?> </a> </div>
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
    <div id="modalDoc" class="modal">
        <div class="modal-content ">
            <a class="black-text"><?php echo $transcricao ?></a>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
</main>
<?php include_once "../interfaces/footer.php"; ?>