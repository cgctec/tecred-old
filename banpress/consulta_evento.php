<?php
session_start();
require_once("../classe/class.php");
$usuario = new Usuario($_SESSION['user'], null);
print_r($_GET['sistema'].' - '.$_GET['momento'].' - '.$_GET['situacao'].' - '.$_GET['vigencia']);
$misc = new Misc($_GET['sistema'], $_GET['momento'], $_GET['situacao'], $_GET['vigencia']);
$uids = $misc->getUidArray($_GET['sistema'], $_GET['momento'], $_GET['situacao'], $_GET['vigencia']);
var_dump($uids);
/*$uids = Misc::getUidArray($_GET['sistema'], $_GET['momento'], $_GET['situacao'], $_GET['vigencia']);*/
if ($usuario->securityVerify())
{
?>
<HTML>
<HEAD>
 <TITLE>Consultar Eventos</TITLE>
 <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/text.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/layout2.css" type="text/css" media="screen" />

	<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/thickbox.js"></script>
	<script type="text/javascript" src="../js/jScrollPane.js"></script>
	<script type="text/javascript" src="../js/inc_evento.js"></script>
	<script type="text/javascript" src="../js/mask.js"></script>
          <script>
          $(function()
	{
	$('.conteudo_consulta').jScrollPane({showArrows:false, scrollbarWidth: 13, arrowSize: 16});
	});
	</script>
</HEAD>
<BODY>
<div id="fundo_consulta">
<a href="consulta_evento_filtro.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<a href="#" ><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<a href="#" ><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<div class="conteudo_consulta">
Conteudo Restrito
</div>
</div>
</body>
</html>
<?php
}
else
{
?>
<HTML>
<HEAD>
 <TITLE>Consultar Eventos</TITLE>
 <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/layout2.css" type="text/css" media="screen" />

	<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/thickbox.js"></script>
	<script type="text/javascript" src="../js/jScrollPane.js"></script>
	<script type="text/javascript" src="../js/inc_evento.js"></script>
	<script type="text/javascript" src="../js/mask.js"></script>
          <script>
          $(function()
	{
	$('.conteudo_consulta').jScrollPane({showArrows:false, scrollbarWidth: 13, arrowSize: 16});
	});
	</script>
</HEAD>
<BODY>
<script type="text/javascript">
function getUrl(vurl, check, filter1, filter2, filter3, filter4)
{
var url = vurl + "&uid=" + check + "&filter1=" + escape(filter1) + "&filter2=" + escape(filter2) + "&filter3=" + escape(filter3) + "&filter4=" + escape(filter4);
return url;
}
function openBox(vurl, check, filter1, filter2, filter3, filter4)
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, getUrl(vurl, check, filter1, filter2, filter3, filter4), false);
}
function menu_cancelar (filter1, filter2, filter3, filter4)
{
var sizes=document.formulario.change;
if (!sizes.length)
{
check = document.getElementById("change_id").value;
}
else
{
	for (i=0; i< sizes.length; i++) {
		if (sizes[i].checked==true) {
                    check = sizes[i].value;
                    break;
		}
	}
}
openBox("cancelar.php?height=200&width=200&modal=true", check, filter1, filter2, filter3, filter4);
}
function menu_alterar (filter1, filter2, filter3, filter4)
{
var sizes=document.formulario.change;
if (!sizes.length)
{
check = document.getElementById("change_id").value;
}
else
{
	for (i=0; i< sizes.length; i++) {
		if (sizes[i].checked==true) {
                    check = sizes[i].value;
                    break;
		}
	}
}
openBox("alt_evento_form.php?height=200&width=520&modal=true", check, filter1, filter2, filter3, filter4);
}
</script>
<div id="fundo_consulta">
<a href="consulta_evento_filtro.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<a href="#" onclick="menu_cancelar(<?php echo ''.$_GET['sistema'] .','. $_GET['momento'] .', \''.$_GET['situacao'].'\', \''.$_GET['vigencia'].'\''; ?>);">Cancelar</a>
<a href="#" onclick="menu_alterar(<?php echo ''.$_GET['sistema'] .','. $_GET['momento'] .', \''.$_GET['situacao'].'\', \''.$_GET['vigencia'].'\''; ?>);">Alterar</a>
<form name="formulario" action="">
<div class="conteudo_consulta">
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
<input type="radio" id="change_id" name="change" value="'.$roteiro->uid.'" class="radio_input"/>
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
</form>
</div>
</BODY>
</HTML>
<?php
}
?>

