<?php
require_once("../classe/class.php");
$sql = new Sql();
$con = $sql->connect();
$codigo = $_GET['codigo'];
$query = "SELECT sistemas.nome as nome
         FROM sistemas
         INNER JOIN roteiro_sistema_momento ON sistemas.codigo = roteiro_sistema_momento.cod_sistema
         WHERE roteiro_sistema_momento.cod_momento = $codigo;";
$sistemas = array();
$res = @mysql_query($query, $con);
while ($fetch = mysql_fetch_array($res))
{
$sistemas[] = $fetch['nome'];
}
if (!$sistemas[0])
{
	mysql_query('DELETE FROM momentos WHERE codigo = '.$codigo.';',$con);
	header('Location: exc_momento_form.php?return=Excluido com sucesso.');
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
header('Location: exc_momento_form.php?return='.urlencode("Impossivel excluir, pois o momento pertence aos seguinte(s) roteiro(s): ".$str));
}
?>
