<!DOCTYPE html>
<html lang="pt-br">

<head>

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

<body>



  <nav class="blue darken-4">
    <div class="nav-wrapper container">
      <a href="../Inicio/"><img class="left white-text" width=70px src="../Imagens/livrob.png"> </a>
      <ul class="right hide-on-med-and-med">
     
        <li><a href="../Inicio/index.php">Lista de Documentos</a></li>
        <li><a href="../Topicos/topicos.php">Lista de Tópicos</a></li>
        <li><a href="../usuarios/listausers.php">Lista de Usuários</a></li>
        <li><div class="input-field col s6 s12 red-text">
        <form action = "../Inicio/pesquisa.php" method = "get">
                            <label class = "prefix" for = "busca"><i class="white-text material-icons ">search</i></label>
                            <input type="search" placeholder="Buscar.." name = "busca" id="busca" class="" >
        </form></div></li>
      </ul>
      
    </div>

  </nav>