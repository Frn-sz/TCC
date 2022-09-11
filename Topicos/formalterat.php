<title>Alterar</title>

<?php

include "../conecta.php";
require_once "../interfaces/header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM topicos WHERE id='$id'";
$resultado = mysqli_query($conexao, $sql);
$topicos = mysqli_fetch_array($resultado, MYSQLI_BOTH);
mysqli_close($conexao);
?>

<form action="alterat.php" method="post" class="container" T>
    <input type="hidden" name="id" value="<?= $topicos['id']; ?>">

    <div class="input-field">
        <span class="white-text">Título</span>
        <input type="text" name="titulo" value="<?= $topicos['titulo']; ?>">
    </div>


    <div class="center">
        <button style='border-radius:10px;' class="btn waves-effect waves-light grey darken-1" type="reset">
            <i class="material-icons">restore</i>
        </button>
        <button style='border-radius:10px;' class="btn waves-effect waves-light grey darken-1" type="submit" name="action">
            <i class="material-icons">check</i>
        </button>
    </div>
</form>


</body>

</html>