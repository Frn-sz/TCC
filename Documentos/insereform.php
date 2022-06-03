<html>
    <head>

    
  
  </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Tela de Cadastro</title>
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
      

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script></head>
    <body>
<?php


function puxartopicos(){

   include "../conecta.php"; 
  

  $sql = "SELECT `id`, `titulo` FROM `topicos`";
  $resultado = mysqli_query($conexao, $sql);
  
  $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
  foreach($topicos as $chave => $topico){
      $titulo = $topico['titulo'];
      $id = $topico['id'];
  
      echo "<option value = $id> $titulo </option>";
  }
  
  

}

?>
 <main>

 
 <?php require_once "../interfaces/header.php"; ?>
 
        <form action="insere.php" method="post" enctype="multipart/form-data">    

		<p> Titulo: <input type="text" name="titulo" required> </p>

        <p> Forma: <select  name = "forma">

          <option value = "Cópia">Cópia</option>
          <option value = "Original">Original</option>

</select>


        <p> Formato: <input type="text"name="formato" required></p>
	    <p> Espécie: <input type="text" name="especie" required></p>		
        <p> Gênero: <input type="text" name="genero" required></p>	
        <p> Localização:  <input type="text" name="localizacao" required></p>	


        <!--Fazendo o cadastro dos niveis didáticos-->
       
        <p> Tópico 1: <select> <?php puxartopicos() ?> </select> </p>
        <p> Tópico 2: <select  name = "topico2"> <?php puxartopicos() ?> </select></p>	
        <p> Tópico 3:  <select  name = "topico3"> <?php puxartopicos() ?> </select></p>		
        <p> Tópico 4: <select  name = "topico4">  <?php puxartopicos() ?> </select></p>
        <p> Tópico 5: <select  name = "topico5">  <?php puxartopicos() ?> </select></p>

<p><input name = "arquivo" type = "file"/></p>
<input type="submit" value="Adicionar Documento" class="button">	

			
</form>			

<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</main>
<?php  require_once "../interfaces/footer.php"; ?>

    </body>

</html>
