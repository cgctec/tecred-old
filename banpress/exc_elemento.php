<?php
require_once("../classe/class.php");
$sql = new Sql();
$con = $sql->connect();
$tipo = $_GET['tipo'];
$elemento_class = new Fatos($tipo, $codigo, null, null);
$no_tipo = $elemento_class->getType();
switch ($no_tipo)
{
case 1:
$cod = 'acao';
break;
case 2:
$cod = 'objeto';
break;
case 3:
$cod = 'alvo';
break;
case 4:
$cod = 'destino';
break;
}
$codigo = $_GET['codigo'];
$res = @mysql_result(mysql_query('SELECT uid FROM roteiro WHERE '.$cod.'_cod = '.$codigo.';', $con),0);
if (!$res)
{
	mysql_query('DELETE FROM modelo_sintatico WHERE codigo = '.$codigo.' AND tipo = '.$no_tipo.';',$con);
	header('Location: exc_elemento_form.php?return=Excluido com sucesso.');
}
else
{
	header('Location: exc_elemento_form.php?return=Existe um evento criado com esse elemento, impossivel excluir.');
}
?>
