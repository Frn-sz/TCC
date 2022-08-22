	<?php
	if (isset($_FILES['arquivo'])) {

		$ext = strrchr($_FILES['arquivo']['name'], '.');
		$nome = md5(time()) . $ext;
		$dir = "../upload/";

		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $nome);
	}
	include_once "../conecta.php";
	$erro = false;
	$idsTopicos = array($_POST[1], $_POST[2], $_POST[3], $_POST[4], $_POST[5]);
	$titulo = $_POST['titulo'];
	$forma = $_POST['forma'];
	$formato = $_POST['formato'];
	$especie = $_POST['especie'];
	$genero = $_POST['genero'];
	$anoDoc = $_POST['ano'];
	$localizacao = $_POST['localizacao'];
	$chavesChar =  $_POST['plvChaves'];
	$imagem = $nome;
	if ($_FILES['arquivo']['error'] == 0) {
		$sql = "INSERT INTO
		 `documentos`(`tituloDoc`,`forma`,`formato`, `especie`, `genero`, `localizacao`,`imagem`, anoDocumento, plvsChaves) 
		VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao', '$imagem', '$anoDoc', '$chavesChar')";
	} else {
		$sql = "INSERT INTO 
		`documentos`(`tituloDoc`,`forma`,`formato`, `especie`, `genero`, `localizacao`, anoDocumento, plvsChaves) 
		VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao', '$anoDoc', '$chavesChar')";
	}
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	var_dump($sql);
	if ($resultado) {
		echo "sas";
		foreach ($idsTopicos as $idTopico) {

			//Fazendo a associação de Topicos e Documentos na tabela associativa (tabela_assoc)
			if ($idTopico != 0) {
				$AssociandoDocTopicos = "INSERT INTO tabela_assoc (id_topico, id_doc) VALUES ('$idTopico', '$id')";
				$resultSet = mysqli_query($conexao, $AssociandoDocTopicos);
				if ($resultSet) {
					$erro = true;
				}
			}
		}
		echo "sus";
		header("location:../Inicio/index.php");
	}




	?>