<main>
    <?php
    include('../interfaces/header.php');
    include('../funcoes.php');
    ?>
    <style>
        input {
            color: white;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:hover,
        textarea:-webkit-autofill:focus,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus {

            -webkit-text-fill-color: black !important;
            -webkit-box-shadow: 0 0 0px 1000px rgba(232, 230, 234, 255) inset !important;
            transition: background-color 5000s ease-in-out 0s !important;
        }

        .formRecupSenha {
            padding: 15px;
            border-radius: 10px !important;
        }

        input,
        textarea,
        select,
        option {
            color: white !important;
        }
    </style>



    <div class="row">
        <div class="container formRecupSenha">
            <div class="center">
                <h4 class="center white-text"><?= exibeMensagens() ?></h4>
            </div>
            <form action="recuperarSenha.php" method="POST">
                <div class="input-field">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="center">
                    <button type="submit" class="btn waves-light waves-effect white black-text">Solicitar recuperação de senha</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class=" row">
                        <div class="container">
                            <div class="row">
                                <form action="recuperarSenha.php" method="Post">
                                    <div class="formRecupSenha">
                                        <div class="input-field">
                                            <input type="email" name="email">
                                            <label for="email">Email</label>
                                            <div class="center">
                                                <button type="submit" class="btn waves-light waves-effect white black-text">Solicitar recuperação de senha</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                </div> -->



</main>


<?php include('../interfaces/footer.php'); ?>