<?php
require '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$sql = new Sql();
$con = $sql->connect();
$momento = $_GET['momento'];
$nome = @mysql_result(mysql_query('SELECT nome FROM momentos WHERE codigo = '.$momento.';', $con),0);
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editar">
<span class="titulo-box-editar">Confirma exclusăo?</span>
<?php
if ($nome)
{
echo '
'.$nome.'<BR>
<a href="exc_momento.php?codigo='.$momento.'"><img src="../imagens/ok.png" width="60" height="60" style="margin-right:80px;"></a><img src="../imagens/menu-voltar.png" width="60" height="60" onclick="tb_remove();">
';
}
else
{
echo '
Nada encontrado.<BR>
<img src="../imagens/bt-voltar-over.png" onclick="tb_remove();">
';
}
?>
</div>
</body>
</html>
