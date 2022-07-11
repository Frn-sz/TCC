
<?php
include "../conecta.php";
$sql = "SELECT * FROM `user`";
$result = mysqli_query($conexao,$sql);
$usuarios = mysqli_fetch_all($result, MYSQLI_BOTH);
?>



<title>Lista de Usuários</title>

     <main>
    <?php include "../interfaces/header.php";?>

    <br>

    <div><a id = "botaoinsere" class = 'waves-effect btn-floating grey darken-2' href = '../usuarios/cadastrouser.php'><i class = "material-icons">add</i> </a></div>
  
    <table class = "container grey darken-1 white-text tabela">
<div class="espaco">
<tr><thead><th> Imagem </th><th> Nome </th> <th> Email </th><thead><tdbody><br>


    <?php foreach($usuarios as $chave => $usuario){ ?>
     <tr>
      <?php if($usuario['foto'] != ""){ ?>
          
     <td> <img class = 'materialboxed' width = 200 src = ../upload/<?=$usuario['foto']?>></td>

     <?php }else{ ?>
     
     <td>Sem Imagem</td>

     <?php } ?>
     <td><?= $usuario['nome']?></td>
     <td><?= $usuario['email']?></td>
    <?php if($usuario['tipoUsuario'] == 2){ ?>
     <td><a class='btn-large grey darken-2' href='elevarAGerente.php?id=<?=$usuario['id']?>'>Elevar a gerente</a></td>
     <?php }else if($usuario['tipoUsuario'] == 3){ ?>
          <td><a class='btn-large grey darken-2' href='rebaixarGerente.php?id=<?=$usuario['id']?>'>Rebaixar gerente</a></td>
     <?php }else{ ?>
          <td>Administrador</td>  
     <?php } ?>

     </tr>
   
   
<?php } ?>

     <tdbody> </table>
    
</main>

<br>

<?php require_once "../interfaces/footer.php"; ?>
