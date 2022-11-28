	<?php
	if (isset($_FILES['arquivo'])) {

		$ext = strrchr($_FILES['arquivo']['name'], '.');
		$nome = md5(time()) . $ext;
		$dir = "../upload/";
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $nome);
		var_dump($_FILES['arquivo']['tmp_name']);
	}
	include_once "../conecta.php";
	$erro = False;
	$idsTopicos = array($_POST[1], $_POST[2], $_POST[3], $_POST[4], $_POST[5]);
	$titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
	$forma = mysqli_real_escape_string($conexao, $_POST['forma']);
	$formato = mysqli_real_escape_string($conexao, $_POST['formato']);
	$especie = mysqli_real_escape_string($conexao, $_POST['especie']);
	$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
	$anoDoc = mysqli_real_escape_string($conexao, $_POST['ano']);
	$localizacao = mysqli_real_escape_string($conexao, $_POST['localizacao']);
	$chavesChar =  mysqli_real_escape_string($conexao, $_POST['plvChaves']);
	$imagem = $nome;
	if ($_FILES['arquivo']['error'] == 0) {
		$sql = "INSERT INTO
		 `documentos`(`tituloDoc`,`forma`,`formato`, `especie`, `genero`, `localizacao`,`imagem`, `anoDocumento`, `palavrasChaves`) 
		VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao', '$imagem', '$anoDoc', '$chavesChar')";
	} else {
		$sql = "INSERT INTO 
		`documentos`(`tituloDoc`,`forma`,`formato`, `especie`, `genero`, `localizacao`, `anoDocumento`, `palavrasChaves`) 
		VALUES ('$titulo','$forma','$formato','$especie','$genero ','$localizacao', '$anoDoc','$chavesChar')";
		var_dump($sql);
	}
	$resultado = mysqli_query($conexao, $sql);
	$id = mysqli_insert_id($conexao);
	if ($resultado) {
		foreach ($idsTopicos as $idTopico) {
			//Fazendo a associação de Topicos e Documentos na tabela associativa (tabela_assoc)
			if ($idTopico != 0) {
				$AssociandoDocTopicos = "INSERT INTO `tabela_assoc`(`id_doc`, `id_topico`) VALUES ('$id','$idTopico')";
				$resultSet = mysqli_query($conexao, $AssociandoDocTopicos);
				if (!$resultSet) {
					$erro = True;
				}
			}
		}

		if ($erro == False) {
			header("location:../Inicio/listaDocs.php");
		}
	}




	?>