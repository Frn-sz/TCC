<title> Tela de Cadastro de Tópicos</title>


<style>
    .formInsere {
        color: black !important;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    label {
        color: black !important;
    }

    .TopicosTitulo {
        display: inline-block;
        text-align: center;
    }

    input {
        color: black !important;
    }

    button {
        border-radius: 10% !important;
    }
</style>
<?php require_once "../interfaces/header.php"; ?>

<main>
    <br><br><br><br>
    <div class="container formInsere">
        <form action="cadastrotopicos.php" method="post">
            <div class="input-field">
                <input id="titulo" type="text" name="titulo" required>
                <label for="titulo">Insira o Tópico que deseja cadastrar</label>
            </div>
            <div class="center">
                <button class="btn waves-effect waves-light black-text white" type="submit" name="action">
                    <i class="material-icons">check</i>
                </button>



            </div>

        </form>
    </div>
</main>
<?php include('../interfaces/footer.php') ?>