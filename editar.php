<?php
require_once("model/crud.class.php");
$id_noticias = "";
$titulo = "";
$texto ="";
$datas ="";
$autor="";

if (isset($_GET['id_noticias'])){
	$noticia = new Crud("noticias");
	$filtro = array(
		"id_noticias" => $_GET['id_noticias']
	);
	$resposta = $noticia->selectCrud("*", true, $filtro);
	$id_noticias = $resposta[0]->id_noticias;
	$titulo = $resposta[0]->titulo;
	$texto = $resposta[0]->texto;
	$datas = $resposta[0]->datas;
	$autor = $resposta[0]->autor;
}


if (isset($_POST['editar'])){
	$noticia = new Crud("noticias");
	$array_dados = array(
		"titulo" => $_POST['titulo'],
		"texto" => $_POST['texto'],
		"datas" => $_POST['data'],
		"autor" => $_POST['autor']
	);
	$array_id = array(
		"id_noticias" => $_POST['id_noticias']
	);
   
	$resposta = $noticia->atualizaCrud($array_dados, $array_id);
	if ($resposta) 
	    header("Location: index.php?editar=sucesso");
	else
		header("Location: index.php?editar=erro");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Editar notícia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">	
		<div class="row pt-4">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2>Editar notícia</h2>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form action="editar.php" method="POST" class="was-validated">
					<input type="hidden" name="id_noticias" value="<?php echo $id_noticias;?>">
					<div class="form-group text-left">

					  <label for="titulo">Título da notícia:</label>
					  <input type="text" class="form-control" id="titulo" placeholder="Título da notícia" name="titulo" value="<?php echo htmlspecialchars($titulo);?>" required>				  
					</div>	
					<div class="form-group text-left">
						<label for="texto">Texto da notícia:</label>
				        <input type="textarea" class="form-control" id="texto" placeholder="Texto da notícia" name="texto" value="<?php echo htmlspecialchars($texto);?>" required>		  
					</div>
					<div class="form-group text-left">
						<label for="data">Data:</label>
						<input type="date" class="form-control" id="data" name="data" value="<?php echo htmlspecialchars($datas); ?>" required>	  
					</div>
					<div class="form-group text-left">
						<label for="autor">Autor da notícia:</label>
						<input type="text" class="form-control" id="autor" placeholder="Autor da notícia" name="autor" value="<?php echo htmlspecialchars($autor); ?>" required>		  
					</div>								
					<button type="submit" name="editar" class="btn btn-primary">Editar Noticia</button>
				</form>  
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
				<a class="btn btn-danger" href="index.php">Voltar</a>
			</div>
		</div>
	</div>
</body>
</html>
