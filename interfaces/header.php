<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php
  if (!isset($_SESSION)) {
    session_start();
  }
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
  <!--Let  browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../node_modules/cropperjs/src/css/cropper.css" rel="stylesheet">
  <script src="../node_modules/cropperjs/src/js/cropper.js"></script>
  <link rel="stylesheet" href="../OwlCarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../OwlCarousel/dist/assets/owl.theme.default.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Inter', sans-serif;
    }

    body {
      display: flex;
      min-height: 150vh;
      flex-direction: column;
      background-image: linear-gradient(to right top, #54317a, #542d76, #542a73, #53266f, #53226b, #3e276a, #292965, #102a5f, #00294d, #002336, #031c21, #101212);
    }

    footer {
      background: transparent !important;
    }

    .footer-copyright {
      background-color: transparent !important;
    }

    main {
      flex: 1 0 auto;

    }

    .usuariologout {
      color: white;
    }

    .search {
      width: 10px;
    }

    .buttonUser {
      margin-left: 40px;
    }

    span.field-icon {
      float: right;
      position: absolute;
      right: 10px;
      top: 10px;
      cursor: pointer;
      z-index: 2;
      color: lightgray;
    }


    .imagemUsuario {
      max-width: 100%;
    }

    .card {
      background-color: rgba(0, 0, 0, 0.8) !important;
      color: white !important;

    }

    .card-content {
      background-color: transparent !important;
    }

    .card.hoverable {
      box-shadow: 0 2px 2px 0 black, 0 3px 1px -2px black, 0 1px 5px 0 black;
    }

    .card.hoverable:hover {
      box-shadow: 1px 3px 4px 0 rgba(41, 0, 51, 1), 1px 4px 2px -2px rgba(41, 0, 51, 1), 1px 4px 9px 0 rgba(41, 0, 51, 1);
    }

    .barraPesquisa {
      padding-left: 15% !important;
      border-top-left-radius: 5px !important;
      border-top-right-radius: 5px !important;
    }

    .menu {
      transition: 0.3s;
      background-color: rgba(0, 0, 0, 0.8) !important;
    }

    .transparent {
      transition: 0.3s;
      background-color: transparent;
    }

    .wrapper {
      height: 2000px;
    }

    .zoom {

      transition: transform .2s;
      /* Animation */
    }

    .zoom:hover {
      transform: scale(1.03);
      /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }

    .logo {
      padding: 7px;
    }

    .modal,
    .modal-content,
    .modal-footer {
      max-width: 100% !important;
      background-color: rgba(255, 255, 255, 0.8) !important;
      border-radius: 10px !important;
      color: white !important;
    }

    .sidenav {
      background-color: rgba(0, 0, 0, 0.8);
    }

    .input-field input[type=text]:focus {
      border-bottom: 1px solid black !important;
      box-shadow: 0 1px 0 0 black !important;
    }

    .materialize-textarea:focus {
      border-bottom: 1px solid black !important;
      box-shadow: 0 1px 0 0 black !important;
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
      box-shadow: none;
      -webkit-text-fill-color: black !important;
      -webkit-box-shadow: 0 0 0px 1000px rgba(232, 230, 234, 255) inset !important;
      transition: background-color 5000s ease-in-out 0s !important;
    }

    .ordenar {
      background-color: white !important;

      border-top-left-radius: 5px !important;
      border-top-right-radius: 5px !important;
    }
  </style>
</head>

<div class="navbar-fixed">
  <nav class="nav-extended transparent">
    <button href="#" data-target="slide-out" class="sidenav-trigger btn-flat"><i class="material-icons white-text">menu</i></button>
    <div class="nav-wrapper">
      <a href="../Inicio/listaDocs.php"><img class="left white-text logo" width=150px src="../Imagens/LogoTCC.png"> </a>
      <ul class="right hide-on-med">
        <?php if (!isset($_SESSION['id_usuario'])) { ?>
          <li><a class="buttonUser" href="../usuarios/cadastrouser.php">Cadastre-se</a></li>
          <li><a class="buttonUser" href="../usuarios/telalogin.php">Entrar</a></li>
        <?php } else {  ?>
          <li><a class="buttonUser" href="../usuarios/logout.php"><i class="material-icons"> logout </i></a></li>
        <?php  } ?>
      </ul>
    </div>
    <div style="max-width:20%;margin-left:75%" class="nav-content">
      <form action="../Inicio/listaDocs.php" method="get">
        <div class="input-field">
          <input class="barraPesquisa" name="busca" id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <input type="hidden" name="escolha" value='documentos'>
        </div>
    </div>
    </form>
  </nav>
</div>
<ul id="slide-out" class="sidenav">
  <li>
    <div class="user-view">
      <?php if (isset($_SESSION['id_usuario'])) { ?>
        <img style='border-radius:5%' class="hoverable materialboxed" width=200 src="../upload/<?= $_SESSION['foto'] ?>">
        <span class="white-text name large"><?= $_SESSION['nome_usuario'] ?></span>
        <a href="#email"><span class="white-text email"><? $_SESSION['email_usuario'] ?></span></a>

      <?php } else {
        echo "<span class = 'usuariologout'> Usuário não logado </span>";
      } ?>

    </div>
  </li>

  <?php if (isset($_SESSION['id_usuario'])) { ?>

    <li><a class="waves-effect waves-light btn modal-trigger white black-text" href="#modal1">Editar perfil</a> </li>


  <?php } ?>

  <li><a class="white-text" href="../Inicio/listaDocs.php">Lista de Documentos</a></li>
  <li><a class="white-text" href="../Topicos/topicos.php">Lista de Tópicos</a></li>
  <?php if (isset($_SESSION['id_usuario'])) { ?>
    <li><a class="white-text" href="../Documentos/favoritos.php"> Lista de Favoritos </a> </li>

  <?php } ?>
  <?php if (isset($_SESSION['nvl_usuario'])) {

    if ($_SESSION['nvl_usuario'] == 1) { ?>
      <li><a class="white-text" href="../usuarios/listausers.php">Lista de Usuários</a></li>
      <?php if ($_SESSION['nvl_usuario'] == 1) { ?>
        <li><a class="white-text" href="../cadastroDeGerentes/formCadastro.php">Cadastrar Gerentes</a></li>
      <?php }
    }
    if (isset($_SESSION['id_usuario'])) { ?>

      <li><a class="red lighten-2 white-text" href="../usuarios/formExcluirConta.php" class="red-text">Excluir minha conta</a></li>

  <?php }
  } ?>

</ul>
<div id="modal1" class="modal white">
  <div class="modal-content">

    <?php if (isset($_SESSION['id_usuario'])) {
      include('../usuarios/formEditUsuario.php');
    }; ?>

  </div>
</div>



<body>
  <br><br><br><br>