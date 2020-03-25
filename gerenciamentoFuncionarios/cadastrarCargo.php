<?php 
require_once "Conn.php";
if(isset($_POST['btn-cadastrar'])):
	if(
		!empty($_POST['cargo']) &&
		!empty($_POST['salario'])
	):
		$cargo = filter_var($_POST['cargo'], FILTER_SANITIZE_STRING);
		$salario = filter_var($_POST['salario'], FILTER_SANITIZE_NUMBER_FLOAT);

		$c = new Conn();
		$sql = "INSERT INTO cargos VALUES (default,:cargo,:salario);";
		$cadastrar = $c->getConn()->prepare($sql);

		$cadastrar->bindParam(":salario",$salario,PDO::PARAM_STR);
		$cadastrar->bindParam(":cargo",$cargo,PDO::PARAM_STR);

		$cadastrar->execute();

		if($cadastrar->rowCount()):
			$msg['cadastro'] = "Sucesso Ao Cadastrar Cargo!!!";
			$cor = "success";
		else:
			$msg['cadastro'] = "Falha Ao Cadastrar Cargo!!!";
			$cor = "danger";
		endif;
	else:
		$msg['campos'] = "Preencha Os Campos Corretamente!!!";
		$cor = "warning";
	endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Cadastrar - Funcionarios</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="fa/css/all.css">
</head>
<body class="center-body">
	<nav class="container-fluid shadow navbar navbar-dark navbar-expand-lg bg-nav mb-5">
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

	<div class="container">
		<div class="row">
			<?php if(isset($msg) && isset($cor)): ?>
			<div class="col-12">
				<div class="alert alert-<?php echo $cor;?> fade show alert-dismissible" role="alert">
					<?php 
						foreach ($msg as $value):
							echo $value;
						endforeach;
					 ?>

					 <button class="close" data-dismiss="alert">
					 	<span>&times;</span>
					 </button>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if(isset($_GET['msg'])): ?>
			<div class="col-12">
				<div class="alert alert-info fade show alert-dismissible" role="alert">
					<?php 
						echo $_GET['msg'];
					 ?>

					 <button class="close" data-dismiss="alert">
					 	<span>&times;</span>
					 </button>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header" style="font-size: 1.4em;">
						Cadastro De Cargos
					</div>
					<div class="card-body">
						<form action="cadastrarCargo.php" method="POST">
							<div class="form-group">
								<input type="text" maxlength="100" placeholder="Nome do Cargo" name="cargo" class="form-control form-control-lg mb-2">

								<input type="text" maxlength="50" name="salario" class="form-control form-control-lg" placeholder="Salario:">	
							</div>

							<button class="btn btn-outline-success" name="btn-cadastrar">Cadastrar</button>
						</form>
					</div>
				</div>
			</div>

			<?php 
				$s = new Conn();
				$sqlSelect = "SELECT * FROM cargos";
				$select = $s->getConn()->prepare($sqlSelect);
				$select->execute();						 
			?>
			<div class="col-md-8 t border-left">
				<div class="card pb-0 border-0">
					<div class="card-header" style="font-size: 1.4em;">
						Cargos ja Cadastrados
					</div>
					
						<table class="table table-striped table-hover table-bordered mb-0">
							<thead>
								<th>Cargo</th>
								<th>Salario</th>
								<th class="text-center">
									<i class="far fa-edit text-success fa-lg"></i>	
								</th>
								<th class="text-center">
									<i class="far fa-trash-alt text-danger fa-lg"></i>
								</th>
							</thead>
							<tbody>
								<?php while($row = $select->fetch(PDO::FETCH_ASSOC)): ?>
								<tr>
									<td><?php echo $row['cargo']; ?></td>
									<td>
										<div class="badge badge-secondary">
											<?php echo number_format($row['salario'],2)." R$" ; ?>
										</div>
									</td>
									<td class="text-center">
										<a href="updateCargo.php?id=<?php echo $row['id'];?>">
											<i class="far fa-edit text-success fa-lg"></i>
										</a>
									</td>
									<td class="text-center">
										<a href="deletarCargo.php?id=<?php echo $row['id'];?>">
											<i class="far fa-trash-alt text-danger fa-lg"></i>
										</a>
									</td>
								</tr>
								<?php endwhile;?>
							</tbody>
						</table>				
				</div>
			</div>
		</div>
	</div>		


	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scrollReveal.min.js"></script>
	<script>
		const dom = ScrollReveal({reset: true});
		dom.reveal('.t',{
			delay: 100,
			origin: 'bottom',
			duration: 500,
			distance: '20px'
		});
	</script>
</body>
</html>