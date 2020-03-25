<?php 
require_once "Conn.php";
if(isset($_POST['btn-atualizar'])):
	if(
		!empty($_POST['cargo']) &&
		!empty($_POST['salario'])
	):
		$cargo = filter_var($_POST['cargo'], FILTER_SANITIZE_STRING);
		$salario = filter_var($_POST['salario'], FILTER_SANITIZE_NUMBER_FLOAT);
		$id = $_POST['id'];

		$c = new Conn();
		$sql = "UPDATE cargos SET cargo = :cargo, salario = :salario WHERE id = '$id';";
		$update = $c->getConn()->prepare($sql);

		$update->bindParam(":salario",$salario,PDO::PARAM_STR);
		$update->bindParam(":cargo",$cargo,PDO::PARAM_STR);

		$update->execute();

		if($update->rowCount()):
			header("Location: cadastrarCargo.php?msg=sucesso ao Atualizar");
		else:
			header("Location: cadastrarCargo.php?msg=falha ao atualizar");
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
<body>
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
			<?php 
				$id = $_GET['id'];
				$s = new Conn();
				$sqlSelect = "SELECT * FROM cargos where id = '$id'";
				$select = $s->getConn()->prepare($sqlSelect);
				$select->execute();

				$row = $select->fetch(PDO::FETCH_ASSOC);						 
			?>
			<div class="col-sm-12 col-md-8 offset-md-2 col-lg-10 offset-lg-1">
				<div class="card">
					<div class="card-header" style="font-size: 1.4em;">
						Atualização De Cargos
					</div>
					<div class="card-body">
						<form action="updateCargo.php" method="POST">
							<div class="form-group">
								<input type="text" maxlength="100" value="<?php echo $row['cargo'];?>" name="cargo" class="form-control form-control-lg mb-2">

								<input type="text" maxlength="50" name="salario" class="form-control form-control-lg" value="<?php echo $row['salario'];?>">	
							</div>
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">

							<button class="btn btn-outline-success" name="btn-atualizar">Atualizar</button>
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