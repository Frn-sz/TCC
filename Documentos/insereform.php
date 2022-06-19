<html>

<head>



  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Tela de Cadastro</title>
<style>
  #x{
    text-align: center;
  }
</style>
</head>

<body>
  <?php


  function puxartopicos()
  {

    include "../conecta.php";


    $sql = "SELECT `id`, `titulo` FROM `topicos`";
    $resultado = mysqli_query($conexao, $sql);

    $topicos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
    foreach ($topicos as $chave => $topico) {
      $titulo = $topico['titulo'];
      $id = $topico['id'];

      echo "<option value = $id> $titulo </option>";
    }
  }

  ?>
  <main>


    <?php require_once "../interfaces/header.php"; ?>

    <form class = "container" action="insere.php" method="post" enctype="multipart/form-data">

      <p> Titulo: <input type="text" name="titulo" required> </p>

      <p> Forma: <select name="forma">

          <option value="Cópia">Cópia</option>
          <option value="Original">Original</option>

        </select>


      <p> Formato: </label> <input type="text" name="formato" required></p>
      <p> Espécie: <input type="text" name="especie" required></p>
      <p> Gênero: <input type="text" name="genero" required></p>
      <p> Localização: <input type="text" name="localizacao" required></p>
   

      <div class="file-field input-field">
      <div class="btn blue darken-4">
        <span><i class = "material-icons large">attach_file</i> </span>
        <input name = "arquivo" type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    <button id = "x" style = 'border-radius:10px;'class="btn waves-effect waves-light blue darken-4" type="submit" name="action">
      <i class="material-icons">check</i>
  </button>


    </form>

  </main>
  <br>
  <?php require_once "../interfaces/footer.php"; ?>

 
</body>

</html>