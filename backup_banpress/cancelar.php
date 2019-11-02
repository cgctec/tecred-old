<?php
require_once('../classe/class.php');
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
echo 'Conteudo restrito '. $_SERVER['PHP_SELF'];
}
else
{
$uid = $_GET['uid'];
$sql = new Sql();
$con = $sql->connect();
$momentos = mysql_query('SELECT DISTINCT momentos.nome as nome FROM momentos INNER JOIN roteiro_sistema_momento ON roteiro_sistema_momento.cod_momento = momentos.codigo WHERE roteiro_sistema_momento.cod_roteiro = '.$uid.';',$con);
if (mysql_num_rows($momentos) > 0)
{
$momentos_array = array();
while ($fetch = mysql_fetch_array($momentos))
{
$momentos_array[] = $fetch['nome'];
}
$str = '';
for ($i=0; $i < count($momentos_array); $i++)
{
if ($i != (count($momentos_array) - 1))
{
$str .= $momentos_array[$i] .', ';
}
else
{
$str .= $momentos_array[$i] .'.';
}
}
$returnstr = 'Não é possivel cancelar/descancelar esse evento pois ele pertence a pelo menos um momento. ('.$str.')';
}
else
{
$ic = @mysql_result(mysql_query('SELECT ic_cancelado FROM roteiro WHERE uid = '.$uid.';', $con),0);
switch ($ic)
{
case 'N':
mysql_query('UPDATE roteiro SET ic_cancelado = "S" WHERE uid = '.$uid.';', $con);
$returnstr = 'Cancelado com sucesso.';
break;
case 'S':
mysql_query('UPDATE roteiro SET ic_cancelado = "N" WHERE uid = '.$uid.';', $con);
$returnstr = 'Descancelado com sucesso.';
break;
}
}
$sql->close();
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editar">
     <?php echo $returnstr;?><BR>
     <a href="consulta_evento.php?sistema=<?php echo $_GET['filter1']?>&momento=<?php echo $_GET['filter2']?>&situacao=<?php echo urlencode($_GET['filter3'])?>&vigencia=<?php echo urlencode($_GET['filter4'])?>"><img src="../imagens/ok.png" border="0" height="50" width="50"></a>
</div>
</body>
</html>
<?php
}
?>
