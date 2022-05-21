<html>
    <head>
        <meta charset="utf-8">
        <title> Tela de Cadastro</title>
	
    </head>
    <body>
<?php


function puxartopicos(){

   include "../conecta.php"; 

  $sql = "SELECT `id`, `titulo` FROM `topicos`";
  $resultado = mysqli_query($conexao, $sql);
  
  $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
  
  var_dump($topicos);
  foreach($topicos as $chave => $topico){
      $titulo = $topico['titulo'];
      $id = $topico['id'];
  
      echo "<option value = $id> $titulo </option>";
  }
  
  

}

?>
 
       <h1> Ficha de Cadastro </h1> 
 
        <form action="insere.php" method="post" enctype="multipart/form-data">    

		<p> Titulo: <input type="text" name="titulo" required> </p>

        <p> Forma: <select name = "forma">

          <option value = "Cópia">Cópia</option>
          <option value = "Original">Original</option>

</select>


        <p> Formato: <input type="text"name="formato" required></p>
	      <p> Espécie: <input type="text" name="especie" required></p>		
        <p> Gênero: <input type="text" name="genero" required></p>	
        <p> Localização:  <input type="text" name="localizacao" required></p>	


        <!--Fazendo o cadastro dos niveis didáticos-->
        <p> Nivel Didático 1: <select name = "topico1">  <?php puxartopicos() ?> </select>

        </p>

        <p> Nivel Didático 2: 
          
        <select name = "topico2">
      <?php puxartopicos() ?>
            </select></p>	

        <p> Nivel Didático 3:
          
        <select name = "topico3">
        <?php puxartopicos() ?>
            </select></p>		
        <p> Nivel Didático 4: <select name = "topico4">
       
        <?php puxartopicos() ?>
</select></p>
        <p> Nivel Didático 5: <select name = "topico5">
        <?php puxartopicos() ?>
</select></p>

<p><input name = "arquivo" type = "file"/></p>
        <input type="submit" value="Adicionar Documento" class="button">	
        
        
        

    </div>  
			
        </form>			
</body>
</html>
