

<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php

if(!isset($_SESSION)){
session_start();

}
//var_dump($_SESSION);
?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <style>

body{
    display: flex;
    min-height: 150vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }#botões{
    margin-left: 50%;
  }#botaoinsere{
    margin-left:50%;
  }.usuariologout{
    color: white;
  }.cardindex{
    height:40vh;
   }.cardpesquisa{
   height: 48vh;;
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
}.imagem{
  height: 35vh;
}
  </style>
</head>
 
<nav class = "blue darken-4 ">
<button href="#" data-target="slide-out" class="sidenav-trigger btn-flat"><i class="material-icons white-text">menu</i></button>
<div class="nav-wrapper">
      <div class="container">
      <a href="../Inicio/"><img class="left white-text" width=70px src="../Imagens/livrob.png"> </a>
      <ul class="right hide-on-med-and-med">
       
        <li><div class="input-field col s6 black-text">

        <form action = "../Inicio/pesquisa.php" method = "get">
            <label class = "prefix" for = "busca"><i class="white-text material-icons ">search</i></label>
            <input class = "search" type="search" placeholder="Buscar.." name = "busca" id="busca">
        </form></div></li>
       
        <?php if(!isset($_SESSION['id_usuario'])){ ?>
          
      <li><a class = "buttonUser" href = "../usuarios/cadastrouser.php">Cadastre-se</a></li>
      <li><a  class = "buttonUser"  href = "../usuarios/telalogin.php">Entrar</a></li>

      <?php }else{  ?>
        
        
        <li><a class = "buttonUser" href = "../usuarios/logout.php"><i class = "material-icons"> logout </i></a></li>
        
        <?php  } ?>
       
      </ul>
</div>
      </div>

</nav>


<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
      <img width = "500" src = "../Imagens/biblioteca.jpg">
      </div>
      
      <?php if(isset($_SESSION['id_usuario'])){ ?>
      <img style = 'border-radius:50%' width = 200 src="../upload/<?=$_SESSION['foto']?>">
      <span class="white-text name large"><?= $_SESSION['nome_usuario']?></span>
      <a href="#email"><span class="white-text email"><? $_SESSION['email_usuario'] ?></span></a>
      
      <?php } else { echo "<span class = 'usuariologout'> Usuário não logado </span>"; }?>

    </div></li>

    <?php if(isset($_SESSION['id_usuario'])){ ?>
      
    <li><a class="waves-effect waves-light btn modal-trigger blue darken-4" href="#modal1">Editar perfil</a>  </li>
 
  
  <?php } ?>
        
        <li><a href="../Inicio/index.php">Lista de Documentos</a></li>
        <li><a href="../Topicos/topicos.php">Lista de Tópicos</a></li>
        <?php if(isset($_SESSION['id_usuario'])){ ?>
          <li><a href = "../Documentos/favoritos.php"> Lista de Favoritos </a> </li>

          <?php } ?>
        <?php if(isset($_SESSION['nvl_usuario'])){

                if($_SESSION['nvl_usuario'] == 1){?>
        <li><a href="../usuarios/listausers.php">Lista de Usuários</a></li>

          <?php }}if(isset($_SESSION['id_usuario'])){?>

            <li><a href="../usuarios/formExcluirConta.php" class = "red-text">Excluir minha conta</a></li>

            <?php } ?>
        
  </ul>
  <div id="modal1" class="modal">
    <div class="modal-content">
    
    <?php include('../usuarios/formEditUsuario.php');?>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
    </div>
  </div>

  

  <body>


