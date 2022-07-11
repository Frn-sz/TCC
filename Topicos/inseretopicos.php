
        <title> Tela de Cadastro de Tópicos</title>

   
      
        <?php require_once "../interfaces/header.php";?>
        <main>
            <br>    
        <form class = "container" action="cadastrotopicos.php" method="post">    
        <div class="input-field">
       <input id = "titulo" type="text" name="titulo" class = "white-text" required> 
       <label for="titulo">Insira o Tópico que deseja cadastrar</label>
        </div>
        <div class = "center">
        <button style = 'border-radius:10px;' class = "btn waves-effect waves-light grey darken-1" type = "reset">
    <i class = "material-icons">restore</i>
        </button>
    <button  style = 'border-radius:10px;'class="btn waves-effect waves-light grey darken-1" type="submit" name="action">
      <i class="material-icons">check</i>
  </button>	

        
        
    </div>  
			
        </form>		
        </main>	
<?php include('../interfaces/footer.php') ?>
