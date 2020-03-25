<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Pagina Inicial Informações</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="fa/css/all.css">
</head>
<body class="center-body bg-light">
	<div class="container mt-5">
		<div class="row mt-5">
			<div class="col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-sm-12">
				<div class="card shadow">
					<div class="card-body pb-0">
						<h1 class="display-4 text-center">LOGO</h1>
						<form action="validaLogin.php" method="POST">
							<div class="form-group">
								<input type="text" class="form-control form-control-lg mb-2" name="email" placeholder="Digite Aqui Seu Email!" autocomplete="off" autofocus>
								<input type="text" class="form-control form-control-lg mb-2" name="senha" placeholder="Digite Aqui Sua Senha" autocomplete="off">
								<button class="btn btn-primary btn-block" name="btn-logar">Login</button>
							</div>
						</form>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<a href="#">Esqueceu sua senha?</a>
						<a href="#">Criar Conta</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scrollReveal.min.js"></script>
</body>
</html>