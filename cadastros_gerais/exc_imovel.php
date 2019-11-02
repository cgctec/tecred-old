<?php
session_start();
require_once("../classe/class.php");
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$sql = new Sql();
$con = $sql->connect();
mysql_query("DELETE FROM imoveis WHERE COD_IMOVEL = ".$_GET['COD_IMOVEL'].";",$con);
$sql->close();
header('Location: imoveis.php');
?>
