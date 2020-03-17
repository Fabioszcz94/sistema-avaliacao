<?php
    require_once("model/crud.class.php");
   
	if(isset($_POST['cadastrar'])) {  #cadastrar vem do name do botão
		$noticia = new Crud("noticias");
		$array_dados = array(
			"titulo"=> $_POST['titulo'],
			"texto"=> $_POST['texto'],
			"datas" =>  $_POST['data'],
			"autor" =>  $_POST['autor']
		);

		$resposta =$noticia-> insereCrud($array_dados);
		   if ($resposta)
		header("location: index.php? cadastrar=sucesso");
		   else
		header("location: index.php?cadastrar=erro");
        
		
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de notícias</title>
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
		<div class="row">
		   <div class="col-sm-12 col-md-6 col-lg-6">
				<h2>Lista de notícias</h2>			
		   </div>
		   <div class="col-sm-12 col-md-6 col-lg-6 text-right">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Cadastro de notícias</button>
				<!-- The Modal -->
				<div class="modal fade" id="myModal">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Cadastro de usuários</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <!-- Modal body -->
					  <div class="modal-body">
							<form action="index.php" method="POST" class="was-validated">
								<div class="form-group text-left">
								  <label for="titulo">Título da notícia:</label>
								  <input type="text" class="form-control" id="titulo" placeholder="Título da notícia" name="titulo" required>				  
								</div>	
								<div class="form-group text-left">
									<label for="texto">Texto da notícia:</label>
									<textarea class="form-control" id="texto" placeholder="Texto da notícia" name="texto" required></textarea>		  
								</div>
								<div class="form-group text-left">
									<label for="data">Data:</label>
									<input type="date" class="form-control" id="data" name="data" required>	  
								</div>
								<div class="form-group text-left">
									<label for="autor">Autor da notícia:</label>
									<input type="text" class="form-control" id="autor" placeholder="Autor da notícia" name="autor" required>		  
								</div>								
								<button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
							</form>   
						</div>
					  <!-- Modal footer -->
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
					  </div>
					</div>
				  </div>
				</div>
		   </div>
		</div>
		
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>Id</th>
			<th>Título</th>
			<th>Texto</th>
			<th>Data</th>
			<th>Autor</th>
			<th class="text-center">Ações</th>
		  </tr>
		</thead>
		<tbody>  
		 
		<?php    #retorna usuarios do banco
			   $noticia = new Crud("noticias");
			   $resposta = $noticia->selectCrud("*");#retona todos os dados das tabelas
			   foreach($resposta as $nidice => $valor) {
				echo '<tr>';
				echo '<td>' . ($valor->id_noticias) . '</td>';
				echo '<td>' . ($valor->titulo) . '</td>';
				echo '<td>' . $valor->texto . '</td>';
				echo '<td>' . $valor->datas . '</td>';
				echo '<td>' . $valor->autor . '</td>';
				echo '<td class="text-center">';
				echo '<a href="editar.php?id_noticias=' . $valor->id_noticias . '" title="Editar"><i class="fa fa-pencil"></i></a> ';
				echo '<a href="excluir.php?id_noticias=' . $valor->id_noticias .'" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>';
				echo '</td>';
			    echo '</tr>'; 
			   }
			  ?>
		</tbody>
		</table>
	</div>
</body>
</html>
