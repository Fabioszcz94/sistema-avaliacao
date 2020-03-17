
<?php
require_once("model/crud.class.php");

$id_noticias ="";
$titulo ="";

if (isset($_GET['id_noticias'])){
	$noticia = new Crud("noticias");
	$filtro = array(
		"id_noticias" => $_GET['id_noticias']
	);
	$resposta = $noticia->selectCrud("*", true, $filtro);
	$id_noticias = $resposta[0]->id_noticias;
	$titulo = $resposta[0]->titulo;
	
	if (isset($_GET['confirmar'])){
		$resposta = $noticia->excluiCrud($filtro);
		if ($resposta) header("Location: index.php");
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Excluir notícia</title>
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
				<h2>Excluir a notícia "<?php echo htmlspecialchars($titulo); ?>?"</h2>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
				<a class="btn btn-danger" href="excluir.php?id_noticias=<?php echo $id_noticias; ?>&confirmar">Confirmar</a>
				<a class="btn btn-secondary" href="index.php">Cancelar</a>
			</div>
		</div>
	</div>
</body>
</html>
