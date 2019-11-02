<?php
require_once("../classe/class.php");
$sql = new Sql();
$con = $sql->connect();
$uid = $_GET['uid'];
$uid2 = $uid + 1;
$uid3 = $uid + 2;
$uid4 = $uid + 3;
$query = "SELECT sistemas.nome as nome
         FROM sistemas
         INNER JOIN roteiro_sistema_momento ON sistemas.codigo = roteiro_sistema_momento.cod_sistema
         WHERE roteiro_sistema_momento.cod_roteiro = $uid
         OR roteiro_sistema_momento.cod_roteiro = $uid2
         OR roteiro_sistema_momento.cod_roteiro = $uid3
         OR roteiro_sistema_momento.cod_roteiro = $uid4";
//echo $query;
$sistemas = array();
$res = @mysql_query($query, $con);
while ($fetch = mysql_fetch_array($res))
{
$sistemas[] = $fetch['nome'];
}
if (!$sistemas[0])
{
	mysql_query("DELETE FROM roteiro WHERE uid = $uid",$con);
	$temp = $uid+1;
	mysql_query("DELETE FROM roteiro WHERE uid = $temp",$con);
	$temp++;
	mysql_query("DELETE FROM roteiro WHERE uid = $temp",$con);
	$temp++;
	mysql_query("DELETE FROM roteiro WHERE uid = $temp",$con);
	header('Location: exc_evento_form.php?return=Excluido com sucesso.');
}
else
{
$str = '';
for ($i = 0; $i < count($sistemas); $i++)
{
if ($i != count($sistemas) - 1)
{
$str .= $sistemas[$i] . ', ';
}
else
{
$str .= $sistemas[$i] . '.';
}
}
header('Location: exc_evento_form.php?return='.urlencode("Impossivel excluir, pois o evento pertence aos seguinte(s) roteiro(s): ".$str));
}
?>
