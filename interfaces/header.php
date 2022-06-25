

<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php

session_start();

if(!array_key_exists('id_usuario', $_SESSION)){
  session_destroy();
}
  

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
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }#botões{
    margin-left: 50%;
  }#botaoinsere{
    margin-left:50%;
  }
  </style>
</head>
 
<nav class = "blue darken-4 ">
<button href="#" data-target="slide-out" class="sidenav-trigger btn-flat"><i class="material-icons white-text">menu</i></button>
<div class="nav-wrapper">
      <div class="container">
      <a href="../Inicio/"><img class="left white-text" width=70px src="../Imagens/livrob.png"> </a>
      <ul class="right hide-on-med-and-med">
        <?php if(!array_key_exists('id_usuario', $_SESSION)){ ?>
      <li><a href = "../usuarios/cadastrouser.php">Cadastre-se</a></li>
      <li><a href = "../usuarios/telalogin.php">Entrar</a></li>

      <?php }else{  ?>
        
        
        <li><a href = "../usuarios/logout.php">Sair</a></li>
        
        <?php  } ?>
        <li><div class="input-field col s6 black-text">

        <form action = "../Inicio/pesquisa.php" method = "get">
                            <label class = "prefix" for = "busca"><i class="white-text material-icons ">search</i></label>
                            <input type="search" placeholder="Buscar.." name = "busca" id="busca">
        </form></div></li>
      </ul>
</div>
      </div>
  
</nav>


<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
      
      </div>
      <?php if(array_key_exists('id_usuario', $_SESSION)){ ?>
      <img width = 200 src="../upload/<?=$_SESSION['foto']?>">
      <span class="white-text name">John Doe</span>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
      <?php } else { echo "Usuário não logado"; }?>
    </div></li>
    <li><a href="../Inicio/index.php">Lista de Documentos</a></li>
        <li><a href="../Topicos/topicos.php">Lista de Tópicos</a></li>
        <li><a href="../usuarios/listausers.php">Lista de Usuários</a></li>
  </ul>
  </ul>
  

  <body>


