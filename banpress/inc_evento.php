<?php
session_start();
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
			$options[] = '<option id="'.$fetch['codigo'].'|'.$fetch['rotulo'].'" disabled="true">'.htmlentities($fetch['nome']).'</option>';
		}
		else
		{
			$options[] = '<option id="'.$fetch['codigo'].'|'.$fetch['rotulo'].'">'.htmlentities($fetch['nome']).'</option>';
		}
	}
	$sql->close();
	return $options;
}
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editara">
<script>
jQuery(function($){
   $("#cpf_id").mask("999.999.999-99");
});
</script>
<script>
</script>
<a href="#" onclick="tb_remove();"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Conteudo restrito</span>
Conteudo restrito.
</div>
</body>
</html>
<?php
}
else
{
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="box-editara">
          <a href="#" onclick="tb_remove();"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
	<span class="titulo-box-editar">Incluir Evento</span>
 <form  method="post" action="inc_evento_grava.php" name="form">
<table class="tabela_pesquisa"  cellspacing="0" align="center" width="80%">
	<tr>
		<td>A&ccedil;&atilde;o:</td><td><input value="<?php echo $_GET['cod1'];?>" type="text" name="codigo1" id="cod1" size="2" maxLength="3" onchange="SetIndex('sel1', 'cod1');" onload="focus();" onblur="escreveFrase();";/><select id="sel1" onchange="setCode('sel1', 'cod1');" onblur="escreveFrase();"><option></option><?php foreach (getList(1) as $option) {echo $option;}?></select></td>
	</tr>
	<tr>
		<td>Objeto:</td><td><input value="<?php echo $_GET['cod2'];?>" type="text" name="codigo2" id="cod2" size="2" maxLength="5" onchange="SetIndex('sel2', 'cod2');" onblur="escreveFrase();"/><select id="sel2" onchange="setCode('sel2', 'cod2');" onblur="escreveFrase();"><option></option><?php foreach (getList(2) as $option) {echo $option;}?></select></td>
	</tr>
	<tr>
		<td>Alvo:</td><td><input value="<?php echo $_GET['cod3'];?>" type="text" name="codigo3" id="cod3" size="2" maxLength="5" onchange="SetIndex('sel3', 'cod3');" onblur="escreveFrase();"/><select id="sel3" onchange="setCode('sel3', 'cod3');" onblur="escreveFrase();"><option></option><?php foreach (getList(3) as $option) {echo $option;}?></select></td><td></td>
	</tr>
	<tr>
		<td>Origem:</td><td><input value="<?php echo $_GET['cod4'];?>" type="text" name="codigo4" id="cod4" size="2" maxLength="5" onchange="SetIndex('sel4', 'cod4');" onblur="escreveFrase();"/><select id="sel4" onchange="setCode('sel4', 'cod4');" onblur="escreveFrase();"><option></option><?php foreach (getList(4) as $option) {echo $option;}?></select></td>
	</tr>
	<tr>
		<td>Destino:</td><td><input value="<?php echo $_GET['cod5'];?>" type="text" name="codigo5" id="cod5" size="2" maxLength="5" onchange="SetIndex('sel5', 'cod5');" onblur="escreveFrase();"/><select id="sel5" onchange="setCode('sel5', 'cod5');" onblur="escreveFrase();"><option></option><?php foreach (getList(4) as $option) {echo $option;}?></select></td>
	</tr>
</table>
<table class="tabela_pesquisa"  cellspacing="5" align="center">
	<tr>
		<td><textarea readonly="1" id="frase1" name="ffrase1"></textarea></td>
	</tr>
	<tr>
		<td><textarea readonly="1" id="frase2" name="ffrase2"></textarea></td>
	</tr>
	<tr>
		<td><textarea readonly="1" id="frase3" name="ffrase3"></textarea></td>
	</tr>
	<tr>
		<td><textarea readonly="1" id="frase4" name="ffrase4"></textarea></td>
	</tr>
</table>
<table class="tabela_pesquisa"  cellspacing="0" align="center">
	<tr>
		<td>Sugest&atilde;o para R&oacute;tulo</td><td><input type="text" id="rot1" name="rotulo1" size="40" onchange="displayChars('1');"/></td><td align="left" id="chars1"></td>
	</tr>
	<tr>
		<td>Sugest&atilde;o para R&oacute;tulo do Extorno:</td><td><input type="text" id="rot2" name="rotulo2" size="40" onchange="displayChars('2');"/></td><td align="left" id="chars2"></td>
	</tr>
	<tr>
		<td>Sugest&atilde;o para R&oacute;tulo do Agendamento:</font></td><td><input type="text" id="rot3" name="rotulo3" size="40" onchange="displayChars('3');"/></td><td align="left" id="chars3"></td>
	</tr>
	<tr>
		<td>Sugest&atilde;o para R&oacute;tulo do Extorno do Agendamento:</font></td><td><input type="text" id="rot4" name="rotulo4" size="40" onchange="displayChars('4');"/></td><td align="left" id="chars4"></td>
	</tr>
</table>
<table class="tabela_pesquisa"  cellspacing="0" align="center" width="80%">
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
        <td  class="td_rodape" colspan="2"><div align="center"><input type="image" src="../imagens/botao-confirma.png" value="OK"/></div></td>
    </tr>
</table>
<br />
<div align="center">
	<?php
		if ($_GET['return'] == 1)
		{
			echo 'Roteiro adicionado com sucesso.';
		}
		else
		{
			if ($_GET['return'] != false)
			{
				echo $_GET['return'];
			}
		}
	?>
</div>
</form>
</div>
<script>
SetIndex('sel1', 'cod1');
SetIndex('sel2', 'cod2');
SetIndex('sel3', 'cod3');
SetIndex('sel4', 'cod4');
SetIndex('sel5', 'cod5');
escreveFrase();
</script>
<?php
}
?>
