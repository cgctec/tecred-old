<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>

<body>
<div id="box-editar">
     <?php

	if ($_GET['return'] != false)
	{
          	echo $_GET['return'];
	}

     ?>
     <table>
     <tr>
     <td>
     Corrigir:
     </td>
     <td>
     <a href="<?php echo $_GET['destino']."?height=530&width=260&modal=true&NU_CONTRATO=".$_GET['NU_CONTRATO']."&ORIGEM=".$_GET['ORIGEM']."&SIS_AMORTIZACAO=".$_GET['SIS_AMORTIZACAO']."&TX_JUROS=".urlencode($_GET['TX_JUROS'])."&PRAZO_AMORTIZACAO=".$_GET['PRAZO_AMORTIZACAO']."&PRAZO_PRORROGACAO=".$_GET['PRAZO_PRORROGACAO']."&DT_ASSINATURA=".urlencode($_GET['DT_ASSINATURA'])."&DT_VENCIMENTO=".urlencode($_GET['DT_VENCIMENTO'])."&NU_REGRA_EVOLUCAO=".$_GET['NU_REGRA_EVOLUCAO']."&APOLICE=".$_GET['APOLICE']."&SEGURADORA=".$_GET['SEGURADORA']."&PAC_RENDA=".urlencode($_GET['PAC_RENDA']);?>" class="thickbox"><img src="../imagens/edit.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     <tr>
     <td>
     Voltar:
     </td>
     <td>
     <a href="contratos.php"><img src="../imagens/menu-voltar.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     </table>
</div>
</body>
</html>
