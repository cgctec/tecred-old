<?php
require '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$incluir = new Sistema_Momento($_POST['tipo'], null, $_POST['nome']);
if ($incluir->InsertData())
{
	header('Location: inc_momento.php?return=1');
}
else
{
	header('Location: inc_momento.php?return='.urlencode($incluir->erro).'');
}
?>
