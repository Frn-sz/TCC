<html>
    <head>
        <meta charset="utf-8">
        <title> Tela de Cadastro</title>
	
    </head>
    <body>
       <h1> Ficha de Cadastro </h1> 
 
        <form action="insere.php" method="get">    

		<p> Titulo: <input type="text" name="titulo" required> </p>

        <p> Forma: <select name = "forma">

          <option value = "Cópia">Cópia</option>
          <option value = "Original">Original</option>

</select>


        <p> Formato: <input type="text"name="formato" required></p>
	    <p> Espécie: <input type="text" name="especie" required></p>		
        <p> Gênero: <input type="text" name="genero" required></p>	
        <p> Localização:  <input type="text" name="locali" required></p>	

        <p> Nivel Didático 1: <select name = "nv1">
             <?php
            include "conecta.php"; 
            $sql = "SELECT `id`, `topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
               
                echo "<option value='$topicos'>". $topicos . "</option>";
            }
           
            ?>
</select>

        </p>

        <p> Nivel Didático 2: <select name = "nv2">
             <?php
            include_once "conecta.php"; 
            $sql = "SELECT `id`, `topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }
           
            ?>
</select></p>	
        <p> Nivel Didático 3: <select name = "nv3">
             <?php
            include_once "conecta.php"; 
            $sql = "SELECT `id`, `topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }
           
            ?>
</select></p>		
        <p> Nivel Didático 4: <select name = "nv4">
             <?php
            include_once "conecta.php"; 
            $sql = "SELECT `id`, `topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }
           
            ?>
</select></p>
        <p> Nivel Didático 5: <select name = "nv5">
             <?php
            include_once "conecta.php"; 
            $sql = "SELECT `id`, `topicos` FROM `topicos`";
            $resultado = mysqli_query($conexao, $sql);
            echo "<option value = ''></option>";
            while($linha = mysqli_fetch_assoc($resultado)){
              $id = $linha['id'];
              $topicos = $linha['topicos'];
                echo "<option value='$topicos'>". $topicos . "</option>";
            }
           
            ?>
</select></p>
        <input type="submit" value="Adicionar Documento" class="button">	
        
        
    </div>  
			
        </form>			
</body>
</html>
