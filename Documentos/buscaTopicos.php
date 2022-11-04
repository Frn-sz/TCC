<?php
if (!isset($_SESSION)) {
    session_start();
}
include("../conecta.php");
$idTopico = $_GET['idTopico'];
$selectDocTopicos = "SELECT * FROM documentos AS D
                JOIN tabela_assoc AS t
                ON D.idDoc = t.id_doc
                WHERE t.id_topico = '$idTopico'";
$query = mysqli_query($conexao, $selectDocTopicos);
$documentos = mysqli_fetch_all($query, MYSQLI_ASSOC);
include("../interfaces/header.php");
?>
<style>
    a {
        color: white !important;
    }
</style>
<main>
    <div class='container'>
        <div class='row'>
            <?php
            if (isset($documentos)) {
                foreach ($documentos as $chave => $documento) { ?>
                    <a href="../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>">
                        <div class="caixa">
                            <div class='col s6 m3'>
                                <div class='card hoverable'>
                                    <div class='card-image cardindex'>
                                        <?php if ($documento['imagem'] != "") {  ?>
                                            <img class='imagem' src='../upload/<?= $documento['imagem'] ?>'>
                                        <?php } else { ?>
                                            <img class='imagem' src='../Imagens/placeholderSemImagem.png'>
                                        <?php } ?>
                                    </div>
                                    <div class='card-content'>
                                        <span class='card-title'><?= $documento['tituloDoc'] ?></span>
                                        <p> Forma:<?= $documento['forma'] ?> <br></p>
                                        <p> Formato:<?= $documento['formato'] ?> <br></p>
                                        <p> Espécie:<?= $documento['especie']  ?></p>
                                    </div>
                                    <div class='card-action center'>

                                        <?php if (!isset($_SESSION['id_usuario']) or $_SESSION['nvl_usuario'] == 2) { ?>

                                            <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-large waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>

                                        <?php } else { ?>

                                            <a href='../Documentos/vermais.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light white'><i class='material-icons black-text'>search</i> </a>

                                        <?php } ?>

                                        <?php if (isset($_SESSION['nvl_usuario'])) {

                                            if ($_SESSION['nvl_usuario'] != 2) { ?>
                                                &nbsp
                                                <a href='../Documentos/formaltera.php?idDoc=<?= $documento['idDoc'] ?>' class='btn-floating waves-effect waves-light  white'> <i class='material-icons black-text'>edit</i> </a>
                                                &nbsp
                                                <a class="waves-effect waves-light btn-floating modal-trigger white " href="#modal<?= $documento['idDoc'] ?>"><i class="material-icons black-text">delete</i></a>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                    </a>
        </div>



        <div id="modal<?= $documento['idDoc'] ?>" class="modal">
            <div class="modal-content">
                <div class="row">
                    <div class="center">
                        <h4 class="black-text">Deseja mesmo excluir este documento?</h4>
                    </div>
                </div>
                <form action="../Documentos/excluir.php" method="get">
                    <div class="row">
                        <div class="center">
                            <input type="hidden" name="idDoc" value="<?= $documento['idDoc']; ?>">
                        </div>
                    </div>
                    <div class="center">
                        <button type="submit" class="btn waves-effect waves-green white black-text">Confirmar</button>
                        <a href="#!" class="modal-close waves-effect waves-red white btn black-text">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
<?php    }
            } ?>
    </div>
</main>

<?php

include("../interfaces/footer.php");


?>