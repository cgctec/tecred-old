<?php
require_once("../classe/class.php");
function getList($type)
{
	$sql = new Sql();
	$con = $sql->connect();
	$options = array();
	$query = 'SELECT codigo, nome, rotulo FROM modelo_sintatico WHERE tipo = '.$type.' ORDER BY nome ASC;';
	$result = mysql_query($query, $con);
	while ($fetch = mysql_fetch_array($result))
	{
		if ($fetch['codigo'] > 1000)
		{
			$options[] = '<option id="'.$fetch['codigo'].'|'.$fetch['rotulo'].'" disabled="true">'.$fetch['nome'].'</option>';
		}
		else
		{
			$options[] = '<option id="'.$fetch['codigo'].'|'.$fetch['rotulo'].'">'.$fetch['nome'].'</option>';
		}
	}
	$sql->close();
	return $options;
}
$options = getList(1);
$sql = new Sql();
$con = $sql->connect();
$res = mysql_result(mysql_query('SELECT nome FROM `modelo_sintatico` WHERE codigo = 2020', $con),0);
$sql->close();
echo "<select>";
foreach ($options as $option)
{
echo $option;
}
echo "</select>";
?>
