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
$result = mysql_query("SELECT NU_CONTRATO FROM participante_contrato WHERE COD_PARTICIPANTE = ".$_GET['COD_PARTICIPANTE'].";",$con);
$contratos = array();
while ($fetch = mysql_fetch_array($result))
{
      $contratos[] = $fetch['NU_CONTRATO'];
}
if (!$contratos[0])
{
    mysql_query("DELETE FROM participantes WHERE COD_PARTICIPANTE = ".$_GET['COD_PARTICIPANTE'].";",$con);
    $sql->close();
    header('Location: seguradoras.php');
}
else
{
    $sql->close();
    header('Location: seguradoras.php?return='.urlencode(serialize($contratos)).'');
}
?>
