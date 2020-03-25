<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte Um Erro</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
</head>
<body class="center-body">
	<div class="container">
		<div class="row">
			<?php if(isset($_POST['btn-enviar'])): ?>
			<div class="col-12">
				<div class="alert alert-success alert-dismissible fade show">
					<h4 class="alert-heading">Erro Reportado: obrigado por contribuir!</h4>
			
					<button class="close" data-dismiss="alert">
						<span>&times;</span>
					</button>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
				<div class="card border-danger">
					<div class="card-header text-white bg-danger">
						Reporte O Seu ERRO
					</div>
					<div class="card-body">
						<form action="report.php" method="POST">
							<div class="form-group form-row">
								<div class="col-5">
									<input type="text" autofocus maxlength="100" class="form-control mb-1" placeholder="Insira Seu Nome Aqui (Opcional)" name="nomeEmissor">
								</div>
								<div class="col-7">
									<input type="text" maxlength="100" class="form-control mb-1" placeholder="Insira Seu Email Aqui Para Retorno" name="email" required>	
								</div>
								
								<div class="col-12">
									<textarea name="mensagem" style="resize: none;" cols="30" rows="10" class="form-control my-1" placeholder="Reporte Aqui Seu Ocorrido Para Que O Erro Possa Ser Corrigido O Mais Rapido Possivel!" required>
									</textarea>


									<button class="btn btn-success" name="btn-enviar">Enviar</button>
									<a href="index.php" class="btn btn-light active">Pagina-Inicial</a>
								</div>
							</div>
						</form>		
					</div>
				</div>
				
			</div>
		</div>
	</div>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>