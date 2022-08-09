

<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php

if(!isset($_SESSION)){
session_start();

}

?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
      

  <!--Let  browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <style>

body{
    display: flex;
    min-height: 150vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }#botaoinsere{
    margin-left:50%;
  }.usuariologout{
    color: white;
  }.cardindex{
    height:40vh;
   }.cardpesquisa{
   height: 50vh;;
   }.search{
    width: 10px;
  }.buttonUser{
    margin-left: 40px;
  } span.field-icon {
    float: right;
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
    z-index: 2;
    color: lightgray;
}.imagem{
  height: 35vh;
  max-width: 100%;
}.imagemUsuario{
  max-width: 100%;
}.card{
  background-color: lightgray;

}input{
  color:white;
}.card.hoverable {
    box-shadow: 0 2px 2px 0 black, 0 3px 1px -2px black, 0 1px 5px 0 black;
}.card.hoverable:hover {
    box-shadow: 2px 4px 5px 0 white, 2px 5px 3px -3px white, 2px 5px 10px 0 white;
}table{
  
  max-width: 100%;
}.barraPesquisa{
  padding-left:13% !important;
  border-top-left-radius:5px !important;
  border-top-right-radius:5px !important;
}
  </style>
</head>

 <div class="navbar-fixed">
<nav class = "grey darken-2 nav-extended">
<button href="#" data-target="slide-out" class="sidenav-trigger btn-flat"><i class="material-icons white-text">menu</i></button>
<div class="nav-wrapper">
      <div class="container">
      <a href="../Inicio/"><img class="left white-text" width=70px src="../Imagens/livrob.png"> </a>
      <ul class="right hide-on-med-and-med">
        <?php if(!isset($_SESSION['id_usuario'])){ ?>
      <li><a class = "buttonUser" href = "../usuarios/cadastrouser.php">Cadastre-se</a></li>
      <li><a  class = "buttonUser"  href = "../usuarios/telalogin.php">Entrar</a></li>
      <?php }else{  ?>
        <li><a class = "buttonUser" href = "../usuarios/logout.php"><i class = "material-icons"> logout </i></a></li>
        <?php  } ?>
      </ul>
</div>
      </div>
      
 <div style = "max-width:20%;margin-left:61%" class="nav-content">

      <form action = "../Inicio/pesquisa.php">
        <div class="input-field">
          <input class = "barraPesquisa" id="search" type="search"  required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
       
        </div>
      </form>
  
  
</nav>
</div>

<ul id="slide-out" class="sidenav grey darken-4">
    <li><div class="user-view">
    
      
      <?php if(isset($_SESSION['id_usuario'])){ ?>
      <img style = 'border-radius:50%' class = "hoverable materialboxed" width = 200 src="../upload/<?=$_SESSION['foto']?>">
      <span class="white-text name large"><?= $_SESSION['nome_usuario']?></span>
      <a href="#email"><span class="white-text email"><? $_SESSION['email_usuario'] ?></span></a>
      
      <?php } else { echo "<span class = 'usuariologout'> Usuário não logado </span>"; }?>

    </div></li>

    <?php if(isset($_SESSION['id_usuario'])){ ?>
      
    <li><a class="waves-effect waves-light btn modal-trigger grey darken-2 white-text" href="#modal1">Editar perfil</a>  </li>
 
  
  <?php } ?>
        
        <li ><a class = "white-text" href="../Inicio/index.php">Lista de Documentos</a></li>
        <li><a  class = "white-text" href="../Topicos/topicos.php">Lista de Tópicos</a></li>
        <?php if(isset($_SESSION['id_usuario'])){ ?>
          <li><a  class = "white-text" href = "../Documentos/favoritos.php"> Lista de Favoritos </a> </li>

          <?php } ?>
        <?php if(isset($_SESSION['nvl_usuario'])){

                if($_SESSION['nvl_usuario'] == 1 OR $_SESSION['nvl_usuario'] == 3){?>
        <li><a   class = "white-text"href="../usuarios/listausers.php">Lista de Usuários</a></li>
        <?php if($_SESSION['nvl_usuario'] == 1){ ?> 
        <li><a  class = "white-text" href="../cadastroDeGerentes/formCadastro.php">Cadastrar Gerentes</a></li>
          <?php }}if(isset($_SESSION['id_usuario'])){?>

            <li><a  class = "red lighten-2 white-text" href="../usuarios/formExcluirConta.php" class = "red-text">Excluir minha conta</a></li>

            <?php }}?>
        
  </ul>
  <div id="modal1" class="modal grey darken-4">
    <div class="modal-content">
    
    <?php include('../usuarios/formEditUsuario.php');?>

    </div>
  </div>

  

  <body class = "grey darken-3">
    <br><br><br>


