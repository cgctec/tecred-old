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
$roteiro = new Consulta_Roteiro($_GET['uid']);
?>

<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body onload="Desabilitar();">
<div id="box-editara">
<a href="consulta_evento.php?sistema=<?php echo $_GET['filter1']?>&momento=<?php echo $_GET['filter2']?>&situacao=<?php echo urlencode($_GET['filter3'])?>&vigencia=<?php echo urlencode($_GET['filter4'])?>"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<script>
function Desabilitar()
{
	if (document.getElementById("sl_input").value != "0")
	{
		document.getElementById("sl_input").readOnly = true;
	}
	if (document.getElementById("cod_contabil_input").value != "nulo")
	{
		document.getElementById("cod_contabil_input").readOnly = true;
	}
}
</script>
<form method="post" action="alt_evento.php">
<input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>"/>
<input type="hidden" name="sistema" value="<?php echo $_GET['filter1'];?>"/>
<input type="hidden" name="momento" value="<?php echo $_GET['filter2'];?>"/>
<input type="hidden" name="situacao" value="<?php echo $_GET['filter3'];?>"/>
<input type="hidden" name="vigencia" value="<?php echo $_GET['filter4'];?>"/>
<table>
	<tr>
  		<td style="text-align: right;"><font color="black">SL/Cod. Contabil:</font></td><td><input size="1" id="sl_input" maxlength="1" name="sl" type="text" value="<?php echo $roteiro->sl;?>"/><input id="cod_contabil_input" name="cod_contabil" type="text" size="10" value="<?php echo $roteiro->cod_contabil;?>" maxlength="10"/></td>
	</tr>
		<td style="text-align: right;"><font color="black">Inicio da Vigencia:</font></td><td><input size="17" name="in_vigencia" type="text" value="<?php echo @date('j F Y',$roteiro->in_vigencia);?>"/></td>
		<td style="text-align: right;"><font color="black">Fim da Vigencia:</font></td><td><input size="17" name="fim_vigencia" type="text" value="<?php echo @date('j F Y',$roteiro->fim_vigencia);?>"/></td>
 <tr>
	</tr>
</table>
<div align="center" style="margin-top:60px;">
<input type="image" src="../imagens/botao-confirma.png" value="OK"/>
</div>
</form>
<?php
if ($_GET['return'] == 1)
{
echo 'Alterado com sucesso.';
}
else
{
if ($_GET['return'])
{
echo $_GET['return'];
}
}
?>
</div>
</body>
</html>
<?php
}
?>
