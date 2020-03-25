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
<body>
	<nav class="container-fluid shadow navbar navbar-dark navbar-expand-lg bg-nav mb-3">
		<div class="container p-0">
			<a href="#" class="navbar-brand">Logo</a>
			
			<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse d-lg-flex justify-content-end navbar-collapse" id="menu">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="listar.php" class="nav-link">Usuarios Cadastrados</a></li>
					<li class="nav-item"><a href="cadastrarUser.php" class="nav-link">Cadastrar Usuario</a></li>
					<li class="nav-item"><a href="cadastrarCargo.php" class="nav-link">Cadastrar Cargos</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2 class="display-4 tit">O Que esse Sistema Faz?</h2>
					<p class="p">esse sistema serve para gerenciamento e cadastro de funcionarios de uma empresa suportando de pequenas e medias empresas ate empresas de porte maior</p>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-sm-12 col-md-4 c1">
					<div class="card border-dark">
						<div class="card-header bg-dark text-white">Cadastros</div>
						<div class="card-body">
							<p class="card-text">Pode se cadastrar varios funcionarios com variações de niveis de acesso com a regra de cadastro</p>
						</div>
						<ul class="list-group nivac">
							<li class="list-group-item">
								<i class="fas fa-user-lock"></i>
								administrador
							</li>
							<li class="list-group-item">
								<i class="fas fa-user-cog"></i>
								gerente
							</li>
							<li class="list-group-item">
								<i class="far fa-file-word"></i>
								estagiario
							</li>
							<li class="list-group-item">
								<i class="fas fa-database"></i>
								coordenador de T.i
							</li>
							<li class="list-group-item">
								<i class="fas fa-laptop-code"></i>
								T.i
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 c2">
					<div class="card border-dark">
						<div class="card-header bg-dark text-white">Atualizações</div>
						<div class="card-body">
							<p class="card-text">O sistema contem a opção de atualizações dos dados dos funcionarios a qualquer momento por permissão apenas do administrador pelos botões de update</p>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 c3">
					<div class="card border-dark">
						<div class="card-header bg-dark text-white">Demissões</div>
						<div class="card-body">
							<p class="card-text">é possivel a retirada de funcionarios do sistema por forma de demissão de forma simples e rapida com o acesso de administrador poupando muito tempo de forma produtiva e funcional</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scrollReveal.min.js"></script>

	<script>
		const dom = ScrollReveal({reset: true});

		dom.reveal('.c1',{
			delay: 1000,
			origin: 'left',
			distance: '20px',
			duration: 1000
		});
		dom.reveal('.c2',{
			delay: 1200,
			origin: 'left',
			distance: '20px',
			duration: 1000
		});
		dom.reveal('.c3',{
			delay: 1800,
			origin: 'left',
			distance: '20px',
			duration: 1000
		});
		dom.reveal('.tit',{
			delay: 0,
			origin: 'left',
			distance: '20px',
			duration: 1000
		});
		dom.reveal('.p',{
			delay: 0,
			origin: 'bottom',
			distance: '20px',
			duration: 1000
		});
	</script>
</body>
</html>