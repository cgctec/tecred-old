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
$ic = mysql_result(mysql_query("SELECT IC_CANCELADO FROM tabela_produtos WHERE NU_PRODUTO = ".$_GET['NU_PRODUTO'].";",$con),0);
if ($ic == 'N')
{
    mysql_query("UPDATE tabela_produtos SET IC_CANCELADO = 'S' WHERE NU_PRODUTO = ".$_GET['NU_PRODUTO'].";",$con);
}
$sql->close();
header('Location: produtos.php');
?>
