<html>

    <head>
        <meta charset="utf-8">
        		
     <style type="text/css">
         body{
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

  </style>
  
        <title> Página Inicial </title>

    </head>

    <body>
      <main>
        <?php  require_once "../interfaces/header.php";?>
        
        <form action="pesquisa.php" method="get">
           
             <p> <input name="busca" type="text" placeholder="Buscar..."/> </p>
            
             <p> <input  type = "submit" id ="botao" value = "Buscar"/> </p>
           
           <br>

            </form>

            </main>

        <a class = "button" href = "index.php"> Listagem de Documentos</a><br>
        <?php require_once "../interfaces/footer.php"; ?>

    </body>
        </html>