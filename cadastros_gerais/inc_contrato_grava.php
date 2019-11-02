<?php session_start(); include 'head.php';?>
<script>
function openBox(url)
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, url, false);
}
function get_radio_value()
{
for (var i=0; i < document.produtos.NU_PRODUTO.length; i++)
   {
   if (document.produtos.NU_PRODUTO[i].checked)
      {
      var rad_val = document.produtos.NU_PRODUTO[i].value;
      return rad_val;
      }
   }
}
function Alterar()
{
openBox('alt_produto.php?height=300&width=500&modal=true&NU_PRODUTO=' + get_radio_value());
}
</script>
<body>
                    <div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Contratos</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                    </div>
		<!-- fim do conteudo -->
		<div id="logo" class="grid_12 alpha omega">
   		</div>
	</div>
</body>
</html>
<?php
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$contrato = new Contratos(null);
$contrato->NU_CONTRATO = $_POST['NU_CONTRATO'];
$contrato->ORIGEM = $_POST['ORIGEM'];
$contrato->SIS_AMORTIZACAO = $_POST['SIS_AMORTIZACAO'];
$contrato->TX_JUROS = str_replace("%","",$_POST['TX_JUROS']);
$contrato->PRAZO_AMORTIZACAO = $_POST['PRAZO_AMORTIZACAO'];
$contrato->PRAZO_PRORROGACAO = $_POST['PRAZO_PRORROGACAO'];
$contrato->NU_PRESTACAO = $_POST['PRAZO_AMORTIZACAO'] + $_POST['PRAZO_PRORROGACAO'];
$contrato->DT_ASSINATURA = @date('Y-m-d', @strtotime(str_replace("/","-",$_POST['DT_ASSINATURA'])));
$contrato->DT_VENCIMENTO = @date('Y-m-d', @strtotime(str_replace("/","-",$_POST['DT_VENCIMENTO'])));
$contrato->NU_REGRA_EVOLUCAO = $_POST['NU_REGRA_EVOLUCAO'];
$contrato->APOLICE = $_POST['APOLICE'];
$contrato->SEGURADORA = $_POST['SEGURADORA'];
$contrato->PAC_RENDA = str_replace("%","",$_POST['PAC_RENDA']);
$contrato->action = 1;
if ($contrato->salvar())
{
   echo '<script>openBox("contrato_ok.php?height=100&width=80&modal=true");</script>';
}
else
   echo "<script>openBox('contrato_return.php?height=200&width=380&modal=true&destino=".urlencode("inc_contrato.php")."&return=".urlencode($contrato->errorstr)."&NU_CONTRATO=".$_POST['NU_CONTRATO']."&ORIGEM=".$_POST['ORIGEM']."&SIS_AMORTIZACAO=".$_POST['SIS_AMORTIZACAO']."&TX_JUROS=".urlencode($_POST['TX_JUROS'])."&PRAZO_AMORTIZACAO=".$_POST['PRAZO_AMORTIZACAO']."&PRAZO_PRORROGACAO=".$_POST['PRAZO_PRORROGACAO']."&DT_ASSINATURA=".urlencode($_POST['DT_ASSINATURA'])."&DT_VENCIMENTO=".urlencode($_POST['DT_VENCIMENTO'])."&NU_REGRA_EVOLUCAO=".$_POST['NU_REGRA_EVOLUCAO']."&APOLICE=".$_POST['APOLICE']."&SEGURADORA=".$_POST['SEGURADORA']."&PAC_RENDA=".urlencode($_POST['PAC_RENDA'])."');</script>";
?>
