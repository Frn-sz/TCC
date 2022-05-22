<html>

    <head>
        <meta charset="utf-8">
        
        <title> Página Inicial </title>
		

     
    </head>

    <body>
      
        <?php  require_once "../interfaces/header.php" ?>
        
        <form action="pesquisa.php" method="post">
           
             <p> <input class="cxbusca" type="text" placeholder="Buscar..."/> </p>
            
             <p> <input class = "button" type = "submit" id = "botao" value = "Buscar"/> </p>
           
           <br>
            </form>
        <a class = "button" href = "index.php"> Listagem de Documentos</a><br>

        
    </body>
        </html>