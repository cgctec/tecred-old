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
$query = 'SELECT * FROM roteiro WHERE acao_cod = '.$_GET['acao'].' AND objeto_cod = '.$_GET['objeto'].' AND alvo_cod = '.$_GET['alvo'].' AND origem_cod = '.$_GET['origem'].' AND destino_cod = '.$_GET['destino'].';';
//echo $query;
$evento = @mysql_fetch_array(mysql_query($query, $con));
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editar">
<span class="titulo-box-editar">Confirma exclusăo?</span>
<?php
if ($evento['frase'])
{
echo '
'.$evento['frase'].'<BR>
<a href="exc_evento.php?uid='.$evento['uid'].'"><img src="../imagens/ok.png" width="60" height="60" style="margin-right:80px;"></a><img src="../imagens/menu-voltar.png" width="60" height="60" onclick="tb_remove();">
';
}
else
{
echo '
Nada encontrado.<BR>
<img src="../imagens/bt-voltar-over.png" onclick="tb_remove();">
';
}
$sql->close();
?>
</div>
</body>
</html>
