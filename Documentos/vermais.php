<?php
include "../conecta.php";
if (!isset($_SESSION)) {
    session_start();
}

include('../funcoes.php');
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
$plvsChaves = explode(",", $documentos['palavrasChaves']);

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
        color: white !important;
        border-radius: 5px;
        padding: 20px;
        size: 10vh;
    }

    .imagemDoc {
        max-height: fit-content;
        max-width: fit-content;
        margin: auto;

        align-items: flex-start !important;
        border-radius: 10px;
    }

    .adicionarTranscricao {
        position: relative;
        margin-top: -15%;
        margin-left: 10% !important;
        color: transparent !important;
        transition: 0.5s !important;
    }

    .Transcricao:hover {
        color: rgba(255, 255, 255, 0.8) !important;
        transition: 0.5s;
    }

    .Fav,
    .botaoModal,
    .botaoTrans {
        color: white !important;
        font-weight: 600;
        border: none !important;
        background:
            linear-gradient(90deg, #620063 50%, #000 0) var(--_p, 100%)/200% no-repeat !important;
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

    .chip {
        background-color: transparent !important;
        color: white !important;

    }

    li {
        list-style-type: none;
    }

    .buttonComentario {
        border-style: none;
        padding: 10px;
        border-radius: 5%;
    }

    .buttonComentario:hover {
        background-color: lightgray;
    }

    .fotoUsuarioComentario {

        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin: auto;
        display: flex;
        align-items: center;


    }

    .comentarios {
        background-color: rgba(255, 255, 255, 0.3);
        padding: 2%;
        width: 100%;
        border-radius: 2%;
    }
</style>
<?php
include_once "../interfaces/header.php";
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
$pegandoTopicos = "SELECT * FROM topicos INNER JOIN tabela_assoc AS T ON T.id_doc = '$id' WHERE idTop = T.id_topico";
$resultSet = mysqli_query($conexao, $pegandoTopicos);
$topicos = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);
?>
<main>
    <br><br><br><br>

    <div class="caixaDocumento">
        <?php if ($documentos['imagem'] != "") { ?>
            <div class="row imagemDoc center">

                <a class="adicionarTranscricao"> <img class='materialboxed ' width=500 src='../upload/<?= $imagem ?>'></a>

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


                        <a class="waves-effect waves-light btn modal-trigger botaoTrans" href="#modalTrans">Transcrição Automática</a>
                        <a class="waves-effect waves-light btn botaoTrans" href="addTranscricao.php?auto=0&&idDoc=<?= $documentos['idDoc'] ?>">Transcrição Manual</a>
                    </div>
                </div>
            <?php }
        }
        if ($existeImagem == 1) {
            if ($documentos['transcricao'] != NULL) {
            ?>

                <div class="row">
                    <div class="center">
                        <a class="waves-effect waves-light btn modal-trigger botaoModal" href="#modalDoc">Mostrar transcrição</a>
                    </div>
                </div>
        <?php }
        } ?>
        <div class="container">
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
        </div>
        <div class="row">
            <div class="center">
                <?php
                foreach ($topicos as $chave => $topico) {
                    if ($topico['idTop'] != "33") { ?>
                        <a href="buscaTopicos.php?idTopico=<?= $topico['idTop'] ?>" class="black-text" href=#>
                            <div class='chip'> <?= $topico['tituloTop'] ?> </div>
                        </a>
                    <?php }
                }
                foreach ($plvsChaves as $plvChave) {
                    if ($plvChave != "." and $plvChave != "") { ?>
                        <a class="plvChave" href="../Inicio/listaDocs.php?busca=<?= $plvChave ?>&&escolha=documentos">
                            <div class='chip'> <?= $plvChave ?> </div>
                        </a>
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
        <?php }
        ?>

        <div class="container comentarios">
            <p>Sessão de comentários</p>
            <?php if (isset($_SESSION['id_usuario'])) { ?>
                <form action="comentar.php" method="post">
                    <div style="display:flex;" class="infoUsuario">
                        <?php if ($_SESSION['foto'] != NULL) { ?>
                            <img class="materialboxed fotoUsuarioComentario" width=50 src="../upload/<?= $_SESSION['foto']; ?>" alt="">
                        <?php } else {  ?>
                            <img class="materialboxed fotoUsuarioComentario" width=50 src="../Imagens/semImagem.jpg" alt="">
                        <?php } ?>
                        &nbsp &nbsp<p><?= $_SESSION['nome_usuario']; ?></p>
                        &nbsp &nbsp &nbsp <textarea class="materialize-textarea" id="comentario" style="color:white" type="text" name="comentario" placeholder="Escreva sua pergunta"></textarea>
                        &nbsp &nbsp &nbsp <button class="buttonComentario" type="submit">Comentar</button>
                    </div>
                    <input type="hidden" name="id" value="<?= $_SESSION['id_usuario'] ?>">
                    <input type="hidden" name="idDocumento" value="<?= $_GET['idDoc'] ?>">
                </form>
            <?php } ?>
            <br>

            <?php
            if (isset($_SESSION['id_usuario'])) {
                listarComentarios($_GET['idDoc'], $_SESSION['id_usuario']);
            } else {
                listarComentarios($_GET['idDoc']);
            }
            ?>
        </div>

    </div>
    <div id="modalDoc" class="modal">
        <div class="modal-content ">
            <a class="black-text"><?= $transcricao ?></a>
        </div>
    </div>
    <div id="modalTrans" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="center">
                    <h4 class="black-text">Deseja realizar a transcrição automática?</h4>
                </div>
                <span class="black-text">
                    A transcrição automática necessita de revisão. Além disso, ela excluirá a transcrição anteriormente salva. Quanto melhor for a qualidade e visibilidade da imagem, melhor será o resultado. Documentos manuscritos tendem a apresentar um resultado ruim.
                </span>
            </div>
            <form action="addTranscricao.php?" method="get">
                <div class="row">
                    <div class="center">
                        <input type=hidden name="auto" value="1">
                        <input type="hidden" name="idDoc" value="<?= $documentos['idDoc'] ?>">
                        <button type="submit" class="btn waves-effect waves-green white black-text">Confirmar</button>
                        <a href="#!" class="modal-close waves-effect waves-red white btn black-text">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include_once "../interfaces/footer.php"; ?>