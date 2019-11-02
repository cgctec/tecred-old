<?php
require '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$uids = Misc::getUidArray($_GET['sistema1'], $_GET['momento'], 'não cancelados', 'vigentes');
$sistema = new Sistema_Momento(null, $_GET['sistema2'], null, null);
$sis = $sistema->getSistema();
if (!$_GET['sistema2'])
{
	header ('Location: e_sistema_form.php');
}
?>
<HTML>
<HEAD>
 <TITLE>New Document</TITLE>
 <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/layout2.css" type="text/css" media="screen" />

	<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/thickbox.js"></script>
	<script type="text/javascript" src="../js/jScrollPane.js"></script>
          <script>
          $(function()
	{
	$('.conteudo_man_roteiro').jScrollPane({showArrows:false, scrollbarWidth: 13, arrowSize: 16});
	});
	</script>

</HEAD>
<BODY>
<form method="post" action="e_sistema_done.php">
<input type="hidden" name="sistema1" value="<?php echo $_GET['sistema1'];?>"/>
<input type="hidden" name="sistema2" value="<?php echo $_GET['sistema2'];?>"/>
<input type="hidden" name="momento_filtro" value="<?php echo $_GET['momento'];?>"/>
<div style="position:relative; left:50%; top: -2px; z-index:1;"><a href="e_sistema_form.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a></div>
<div id="fundo_man_roteiro">
<div class="conteudo_man_roteiro">
<?php
foreach ($uids as $uid)
{
	$roteiro = new Consulta_Roteiro($uid);
	switch ($roteiro->ic_cancelado)
	{
		case 'N':
			$ic_color = 'green';
			break;
		case 'S':
			$ic_color = 'red';
			break;
	}
	if ($roteiro->fim_vigencia < time())
	{
		$fv_color = 'red';
	}
	else
	{
		$fv_color = 'green';
	}
 	echo '
<input type="radio" name="incluir_roteiro" value="'.$roteiro->uid.'" class="radio_input"/>
<div class="evento">
<table>
       <tr>
			<td style="padding-right: 10px;">CÓDIGO:</td>
                              <td style="padding-right: 2px; padding-left: 2px; border: 1px solid black; background:white; color:black;">'.$roteiro->acao_cod.'</td>
			<td style="padding-right: 2px; padding-left: 2px;border: 1px solid black; background:white; color:black;">'.$roteiro->objeto_cod.'</td>
			<td style="padding-right: 2px; padding-left: 2px;border: 1px solid black; background:white; color:black;">'.$roteiro->alvo_cod.'</td>
			<td style="padding-right: 2px; padding-left: 2px;border: 1px solid black; background:white; color:black;">'.$roteiro->origem_cod.'</td>
			<td style="padding-right: 2px; padding-left: 2px;border: 1px solid black; background:white; color:black;">'.$roteiro->destino_cod.'</td>
			<td style="padding-right: 50px;"></td>
                              <td style="border: 1px solid black; background: white; color:'.$fv_color.';">Vigencia: '.@date('d/m/Y',$roteiro->inicio_vigencia).' - '.@date('d/m/Y',$roteiro->fim_vigencia).'</td>
			<td style="padding-left: 50px; padding-right: 10px;">Cancelado S/N:</td>
			<td style="border: 1px solid black; background: white; color: '.$ic_color.';">'.$roteiro->ic_cancelado.'</td>
			<td style="padding-left: 50px; padding-right: 10px;">SL:</td>
			<td style="padding-right: 10px; padding-left: 10px; border:1px solid black; background: white; color: black;">'.$roteiro->sl.'</td>
			<td style="padding-left: 50px; padding-right: 10px;">Cod. Contabil:</td>
			<td style="padding-right: 10px; padding-left: 10px; background:white; border: 1px solid black; color:black;">'.$roteiro->cod_contabil.'</td>
         </tr>
</table>
'.$roteiro->frase.'
</div>';
}
echo '</div>';
?>
</div>
</div>
<div align="center">
<table>
	<tr>
		<td><input type="image" name="excluir" value="excluir" src="../imagens/up.png"/></td>
		<td><select name="momento"><option value="0">Selecione um momento</option><?php foreach (Misc::getMomentosList() as $option) {echo $option;} ?></select>
		<td><input type="image" name="incluir" value="incluir" src="../imagens/down.png"/></td>
	</tr>
</table>
<?php
if ($_GET['return'])
{
	echo '<div align="center">'.$_GET['return'].'</div>';
}
?>
</div>
<div id="titulo">
<span>
<?php
$sql = new Sql();
$con = $sql->connect();
$sis = mysql_result(mysql_query('SELECT nome FROM sistemas WHERE codigo = '.$_GET['sistema2'].';', $con),0);
$sql->close();
echo 'Roteiro: '.$sis;
?>
</span>
</div>
<div id="fundo_man_roteiro">
<div class="conteudo_man_roteiro">
<?php
$sql = new Sql();
$con = $sql->connect();
if ($_GET['momento2'])
{
	$condição = 'AND roteiro_sistema_momento.cod_momento = '.$_GET['momento2'];
}
else
{
	$condição = '';
}
$result = mysql_query('SELECT momentos.nome as momento, roteiro_sistema_momento.cod_momento as cod_momento, roteiro_sistema_momento.cod_roteiro as cod_roteiro FROM roteiro_sistema_momento INNER JOIN roteiro ON roteiro.uid = roteiro_sistema_momento.cod_roteiro INNER JOIN momentos ON momentos.codigo = roteiro_sistema_momento.cod_momento INNER JOIN sistemas ON sistemas.codigo = roteiro_sistema_momento.cod_sistema WHERE roteiro_sistema_momento.cod_sistema = '.$_GET['sistema2'].' '.$condição.';',$con);
$sql->close();
while ($uid2 = mysql_fetch_array($result))
{
	echo '<input type="hidden" name="momento_'.$uid2['cod_roteiro'].'" value="'.$uid2['cod_momento'].'"/>';
	$momento = $uid2['momento'];
 	$roteiro = new Consulta_Roteiro($uid2['cod_roteiro']);
	switch ($roteiro->ic_cancelado)
	{
		case 'N':
			$ic_color = 'green';
			break;
		case 'S':
			$ic_color = 'red';
			break;
	}
	if ($roteiro->fim_vigencia < time())
	{
		$fv_color = 'red';
	}
	else
	{
		$fv_color = 'green';
	}
	echo '
<input type="radio" name="excluir_roteiro" value="'.$uid2['cod_roteiro'].'" class="radio_input"/>
<div class="evento">
<table>
       <tr>
			<td style="padding-right: 5px;">'.$momento.'</td>
   			<td style="padding-right: 5px;">CÓDIGO:</td>
                              <td style="padding-right: 1px; padding-left: 1px; border: 1px solid black; background:white; color:black;">'.$roteiro->acao_cod.'</td>
			<td style="padding-right: 1px; padding-left: 1px;border: 1px solid black; background:white; color:black;">'.$roteiro->objeto_cod.'</td>
			<td style="padding-right: 1px; padding-left: 1px;border: 1px solid black; background:white; color:black;">'.$roteiro->alvo_cod.'</td>
			<td style="padding-right: 1px; padding-left: 1px;border: 1px solid black; background:white; color:black;">'.$roteiro->origem_cod.'</td>
			<td style="padding-right: 1px; padding-left: 1px;border: 1px solid black; background:white; color:black;">'.$roteiro->destino_cod.'</td>
			<td style="padding-right: 25px;"></td>
                              <td style="border: 1px solid black; background: white; color:'.$fv_color.';">Vigencia: '.@date('d/m/Y',$roteiro->inicio_vigencia).' - '.@date('d/m/Y',$roteiro->fim_vigencia).'</td>
			<td style="padding-left: 25px; padding-right: 5px;">Cancelado S/N:</td>
			<td style="border: 1px solid black; background: white; color: '.$ic_color.';">'.$roteiro->ic_cancelado.'</td>
			<td style="padding-left: 25px; padding-right: 5px;">SL:</td>
			<td style="padding-right: 5px; padding-left: 5px; border:1px solid black; background: white; color: black;">'.$roteiro->sl.'</td>
			<td style="padding-left: 25px; padding-right: 5px;">Cod. Contabil:</td>
			<td style="padding-right: 5px; padding-left: 5px; background:white; border: 1px solid black; color:black;">'.$roteiro->cod_contabil.'</td>
         </tr>
</table>
'.$roteiro->frase.'
</div>';
}
echo '
</div>
</div>
</form>
</body>
</html>';
?>
