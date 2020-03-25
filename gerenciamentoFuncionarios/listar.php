<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Document</title>
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
<?php 
require_once "Conn.php";
$c = new Conn();
$sql = "SELECT user.id,user.modified,user.created,user.nome, user.email, user.senha, emprego.salario, emprego.cargo FROM usuario as user INNER JOIN cargos as emprego on user.funcao = emprego.id;";
$select = $c->getConn()->prepare($sql);
$select->execute();
 ?>
	<section class="container-fluid">
		<div class="container">
			<div class="row">
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

				<?php while($row = $select->fetch(PDO::FETCH_ASSOC)): ?>
				<div class="col-4 mb-2">
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h3 class="lead"><?php echo $row['nome']; ?></h3>
							<div class="w-25 d-flex justify-content-between">
								<a href="updateUser.php?id=<?php echo $row['id'];?>">
									<i class="far fa-edit text-success"></i>	
								</a>
								<a href="deleteUser.php?id=<?php echo $row['id'];?>">
									<i class="far fa-trash-alt text-danger"></i>	
								</a>
							</div>
						</div>
						<ul class="list-group">
							<li class="list-group-item">nome: <?php echo $row['nome']; ?></li>
							<li class="list-group-item">email: <?php echo $row['email']; ?></li>
							<li class="list-group-item">senha: <?php echo $row['senha']; ?></li>
							<li class="list-group-item">salario: <?php echo $row['salario']; ?></li>
							<li class="list-group-item">cargo: <?php echo $row['cargo']; ?></li>
						</ul>
						<div class="card-footer d-flex justify-content-between">
							<small>
								<?php echo $row['created']; ?>
							</small>
							<small>
								<?php echo $row['modified']; ?>
							</small>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	
	



	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>