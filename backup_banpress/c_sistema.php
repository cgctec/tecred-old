<?php
require '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
if ($_POST['sistema1'] && $_POST['sistema2'])
{
$sql = new Sql();
$con = $sql->connect();
$query = 'SELECT * FROM roteiro_sistema_momento WHERE cod_sistema = '.$_POST['sistema1'].';';
$result = mysql_query($query, $con);
while ($fetch = mysql_fetch_array($result))
{
	$query2 = 'INSERT INTO roteiro_sistema_momento (cod_roteiro, cod_sistema, cod_momento, matricula, c_time) VALUES ('.$fetch['cod_roteiro'].', '.$_POST['sistema2'].', '.$fetch['cod_momento'].', "'.$_SESSION['user'].'", '.time().');';
	mysql_query($query2, $con);
	header ('Location: c_sistema_form.php?return=1');
}
$sql->close();
}
else
{
	header ('Location: c_sistema_form.php?return='.urlencode('Selecione os 2 sistemas.'));
}
?>
