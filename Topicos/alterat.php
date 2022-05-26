
<?php

require_once "../conecta.php";

    $id = $_GET['id'];
    $titulo = $_GET['titulo'];
    
        $sql = "UPDATE `topicos` SET `titulo`='$titulo' WHERE id='$id'"; 
        $resultado = mysqli_query($conexao,$sql);

        mysqli_close($conexao);
            
    
    if($resultado){
        header("Location: topicos.php");
    }

    

?>