<main>
    <?php require_once "../interfaces/header.php";
    require_once "../funcoes.php"; ?>
    <br><br>

    <form action="inseretop.php" method="post">

        <div class="container">

            <div class="row">
                <select name="1"><?= puxartopicos() ?> </select>
            </div>
            <div class="row">
                <select name="2"><?= puxartopicos() ?> </select>
            </div>
            <div class="row">
                <select name="3"><?= puxartopicos() ?> </select>
            </div>
            <div class="row">
                <select name="4"><?= puxartopicos() ?> </select>
            </div>
            <div class="row">
                <select name="5"><?= puxartopicos() ?> </select>
            </div>
            <div class="row">
                <div class="col offset-s6">
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action"><i class="material-icons">check</i></button>
                </div>
            </div>
        </div>

    </form>
</main>


<?php include_once "../interfaces/footer.php"; ?>