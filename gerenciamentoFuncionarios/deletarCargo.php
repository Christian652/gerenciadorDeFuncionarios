<?php  
require_once "Conn.php";
$c = new Conn();
$id = $_GET['id'];
$sql = "DELETE FROM cargos WHERE id = '$id'";
$delete = $c->getConn()->prepare($sql);
$delete->execute();

if($delete->rowCount()):
	header("Location: cadastrarCargo.php?msg=cargo deletado com sucesso!!!");
else:
	header("Location: cadastrarCargo.php?msg=falha ao deletar cargo");
endif;