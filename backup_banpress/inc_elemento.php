<?php
require '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: security_error.html');
}
$incluir = new Fatos($_POST['tipo'], $_POST['codigo'], $_POST['nome'], $_POST['rotulo']);
if ($incluir->InsertData())
{
	header('Location: inc_elemento_form.php?return=1');
}
else
{
	header('Location: inc_elemento_form.php?return='.urlencode($incluir->erro).'');
}
?>
