<?php 
require_once "Conn.php";
if(isset($_POST['btn-atualizar'])):
	if(
		!empty($_POST['nome']) &&
		!empty($_POST['nivac']) &&
		!empty($_POST['email']) &&
		!empty($_POST['senha'])
	):
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
			$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
			$nivac = filter_var($_POST['nivac'], FILTER_SANITIZE_NUMBER_INT);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$senhaSanitize = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);
			$senha = password_hash($senhaSanitize, PASSWORD_DEFAULT);

			$c = new Conn();
			$id = $_POST['id'];
			$sql = "UPDATE usuario SET nome = :nome, email = :email, funcao = :nivac,senha = :senha WHERE id = '$id';";
			$update = $c->getConn()->prepare($sql);

			$update->bindParam(":nome",$nome,PDO::PARAM_STR);
			$update->bindParam(":nivac",$nivac,PDO::PARAM_STR);
			$update->bindParam(":email",$email,PDO::PARAM_STR);
			$update->bindParam(":senha",$senha,PDO::PARAM_STR);

			$update->execute();

			if($update->rowCount()):
				header("Location: listar.php?msg=sucesso ao atualizar usuario!");
			else:
				header("Location: listar.php?msg=falha ao atualizar!");
			endif;
		else:
			$msg['email'] = "ATENÇÃO CAMPO DE EMAIL NÃO FOI INSERIDO DE FORMA CORRETA!";
			$cor = "warning";	
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
				$sqlSelect = "SELECT * FROM usuario where id = '$id'";
				$select = $s->getConn()->prepare($sqlSelect);
				$select->execute();

				$rowSelect = $select->fetch(PDO::FETCH_ASSOC);						 
			?>
			<div class="col-sm-12 col-md-8 offset-md-2 col-lg-10 offset-lg-1">
				<div class="card">
					<div class="card-header" style="font-size: 1.4em;">
						Atualização De Cargos
					</div>
					<div class="card-body">
						<form action="updateUser.php" method="POST">
							<div class="form-group form-row">
								<div class="col-md-7 mb-1">
									<input type="text" maxlength="50" value="<?php echo $rowSelect['nome'];?>" name="nome" class="form-control form-control-lg">
								</div>

								<?php 
								$s = new Conn();
								$sqlSelect = "SELECT * FROM cargos";
								$select = $s->getConn()->prepare($sqlSelect);
								$select->execute();
								 ?>

								<div class="col-md-5">
									<select name="nivac" class="form-control form-control-lg">
										<?php while($row = $select->fetch(PDO::FETCH_ASSOC)):?>
										<option value="<?php echo $row['id'];?>">
											<?php echo $row['cargo'];?>		
										</option>
										<?php endwhile; ?>
									</select>
								</div>
							</div>

							<div class="form-group form-row">
								<div class="col-md-8 mb-1">
									<input type="text" maxlength="50" name="email" class="form-control form-control-lg" value="<?php echo $rowSelect['email'];?>">
								</div>

								<div class="col-md-4">
									<input type="text" name="senha" maxlength="30" class="form-control form-control-lg" value="<?php echo $rowSelect['senha'];?>">
									<input type="hidden" name="id" value="<?php echo $rowSelect['id'];?>">
								</div>
							</div>

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