
<?php

require_once "conecta.php";

    $id = $_POST['id'];
    $topico = $_POST['topico'];
    
             
    
        $sql = "UPDATE topicos SET topicos='$topico' WHERE id=$id"; 
        $resultado = mysqli_query($conexao,$sql);

        mysqli_close($conexao);
                
                
    
    
    if($resultado){
        header("Location: topicos.php");
    }

    

?>