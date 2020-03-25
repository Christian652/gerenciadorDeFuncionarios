<?php  
require_once "Conn.php";
$c = new Conn();
$id = $_GET['id'];
$sql = "DELETE FROM usuario WHERE id = '$id'";
$delete = $c->getConn()->prepare($sql);
$delete->execute();

if($delete->rowCount()):
	header("Location: listar.php?msg=cargo deletado com sucesso!!!");
else:
	header("Location: listar.php?msg=falha ao deletar cargo");
endif;