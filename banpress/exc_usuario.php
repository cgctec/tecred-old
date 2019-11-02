<?php
require_once("../classe/class.php");
$sql = new Sql();
$con = $sql->connect();
$matricula = $_GET['matricula'];
mysql_query('UPDATE users SET ban = 1 WHERE matricula = '.$matricula.';',$con);
$sql->close();
header('Location: exc_usuario_form.php?return=Excluido com sucesso.');
?>
