<?php
require '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$tipo = $_GET['tipo'];
$codigo = $_GET['codigo'];
$elemento_class = new Fatos($tipo, $codigo, null, null);
$elemento = $elemento_class->getFato();
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editar">
<span class="titulo-box-editar">Confirma exclusăo?</span>
<?php
if ($elemento['nome'])
{
echo '
<table>
<tr>
<td  style="border: 1px solid black;">
Tipo:
</td>
<td  style="border: 1px solid black;">
Codigo:
<td  style="border: 1px solid black;">
Nome:
</td>
<td  style="border: 1px solid black;">
Abreviatura:
</td>
</tr>
<tr>
<td  style="border: 1px solid black;">
'.$tipo.'
</td>
<td  style="border: 1px solid black;">
'.$codigo.'
</td>
<td  style="border: 1px solid black;">
'.$elemento['nome'].'
</td>
<td  style="border: 1px solid black;">
'.$elemento['rotulo'].'
</td>
</tr>
</table>
<a href="exc_elemento.php?codigo='.$codigo.'&tipo='.urlencode($tipo).'"><img src="../imagens/ok.png" width="60" height="60" style="margin-right:80px;"></a><img src="../imagens/menu-voltar.png" width="60" height="60" onclick="tb_remove();">
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
