<html>
    <head>
        <meta charset="utf-8">
        <title> Tela de Cadastro de Tópicos</title>
        
    </head>
    <body>
      
        <?php require_once "../interfaces/header.php";?>
        <form class = "container" action="cadastrotopicos.php" method="post">    

           
		<p>  Insira o tópico que deseja Cadastrar <input type="text" name="titulo" required> </p>
       
        <div id = "botões">
        <button style = 'border-radius:10px;' class = "btn waves-effect waves-light blue darken-4" type = "reset">
    <i class = "material-icons">cancel</i>
        </button>
    <button  style = 'border-radius:10px;'class="btn waves-effect waves-light blue darken-4" type="submit" name="action">
      <i class="material-icons">check</i>
  </button>	
</div>
        
        
    </div>  
			
        </form>			
</body>
</html>
