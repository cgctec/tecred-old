<?php
set_time_limit(0);
require_once('classe/class.php');
$sql = new Sql();
$con = $sql->connect();
for ($i = 10; $i < 1000000; $i++)
{
mysql_query("INSERT INTO modelo_sintatico (tipo, codigo, nome, rotulo, matricula, c_time) VALUES (4,666,'CAPETA', 'CAP.', 0,0)",$con);
}
$sql->close();
?>
