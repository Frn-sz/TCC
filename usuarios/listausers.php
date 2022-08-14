
<?php
include "../conecta.php";
$sql = "SELECT * FROM `user`";
$result = mysqli_query($conexao,$sql);
$usuarios = mysqli_fetch_all($result, MYSQLI_BOTH);
?>



<title>Lista de Usuários</title>
<style>
.tabelaUsuarios{
     background-color: rgba(255,255,255,0.8);
     border-radius: 10px;
     color: black;
}.imagemUsuarios{
     border: solid 1.5px;
     border-color: rgba(102, 51, 153, 1);
     margin-left: 20%;
     border-radius: 5%;
}
</style>
     <main>
    <?php include "../interfaces/header.php";?>

    <br>

  
    <table class = "container tabelaUsuarios">
<div class="espaco">
<tr><thead><th class = "center"> Imagem </th><th class = "center"> Nome </th> <th class = "center"> Email </th><thead><tdbody><br>


    <?php foreach($usuarios as $chave => $usuario){ ?>
     <tr>
      <?php if($usuario['foto'] != ""){ ?>
          
     <td> <img class = 'materialboxed imagemUsuarios' width = 200 src = ../upload/<?=$usuario['foto']?>></td>

     <?php }else{ ?>
     
     <td class = "center">Sem Imagem</td>

     <?php } ?>
     <td class = "center"><?= $usuario['nome']?></td>
     <td class = "center"><?= $usuario['email']?></td>
    <?php if($usuario['tipoUsuario'] == 2){ ?>
     <td class = "center"><a class='btn-large white black-text' href='elevarAGerente.php?id=<?=$usuario['id']?>'>Elevar a gerente</a></td>
     <?php }else if($usuario['tipoUsuario'] == 3){ ?>
          <td class = "center"><a class='btn-large white black-text' href='rebaixarGerente.php?id=<?=$usuario['id']?>'>Rebaixar gerente</a></td>
     <?php }else{ ?>
          <td class = "center"><a class="btn-large white black-text" href="#">Administrador</a></td>  
     <?php } ?>

     </tr>
   
   
<?php } ?>

     <tdbody> </table>
    
</main>

<br>

<?php require_once "../interfaces/footer.php"; ?>
