<?php
session_start();
require_once("../classe/class.php");
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
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<script>
jQuery(function($){
   $("#ID_TX_JUROS").mask("999.9999%");
   $("#ID_PAC_RENDA").mask("999.9999%");
   $("#ID_DT_ASSINATURA").mask("99/99/9999");
   $("#ID_DT_VENCIMENTO").mask("99/99/9999");
});
function selectSet(selid, value)
{
          i = 0;
	document.getElementById(selid).selectedIndex = 0;
	while (true)
	{
		var id_split = document.getElementById(selid).options[i].value;
		if (id_split == value)
		{
			document.getElementById(selid).selectedIndex = document.getElementById(selid).options[i].index;
			break;
		}
		i++;
	}
}
function calculo()
{
          if (document.getElementById("ID_PRAZO_AMORTIZACAO").value && document.getElementById("ID_PRAZO_PRORROGACAO").value)
          {
                 document.getElementById("ID_NU_PRESTACAO").value = parseInt(document.getElementById("ID_PRAZO_AMORTIZACAO").value) + parseInt(document.getElementById("ID_PRAZO_PRORROGACAO").value);
          }
          else
          {
                 if (document.getElementById("ID_PRAZO_AMORTIZACAO").value)
                 {
                        document.getElementById("ID_NU_PRESTACAO").value = document.getElementById("ID_PRAZO_AMORTIZACAO").value;
                 }
                 else
                 {
                        document.getElementById("ID_NU_PRESTACAO").value = 0;
                 }
          }
}
</script>
<div id="box-editara">
<a href="contratos.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Incluir Contrato</span>
<form  method="post" action="inc_contrato_grava.php" name="form">
<table>
<Tr>
    <Td>
        Nu. Contrato
    </td>
    <Td>
        <input type="text" size="10" name="NU_CONTRATO" value="<?php echo $_GET['NU_CONTRATO'];?>">
    </td>
</tr>
<Tr>
    <Td>
        Origem
    </td>
    <Td>
        <input type="text" size="10" name="ORIGEM" value="<?php echo $_GET['ORIGEM'];?>">
    </td>
</tr>
<tr>
    <Td>
        Sistema de Amortizaçăo
    </td>
    <Td>
        <select name="SIS_AMORTIZACAO" id="ID_SIS_AMORTIZACAO">
                <option value="1">Price</option>
                <option value="2">SAC</option>
        </select>
    </td>
</tr>
<tr>
    <Td>
        Taxa de juros
    </td>
    <Td>
        <input type="text" name="TX_JUROS" id="ID_TX_JUROS" size="10" value="<?php echo $_GET['TX_JUROS'];?>">
    </td>
</tr>
<tr>
    <Td>
        Prazo de amortizaçăo
    </td>
    <Td>
        <input type="text" id="ID_PRAZO_AMORTIZACAO" name="PRAZO_AMORTIZACAO" onblur="calculo();" size="10" value="<?php echo $_GET['PRAZO_AMORTIZACAO'];?>">
    </td>
</tr>
<tr>
    <Td>
        Prazo de prorrogaçăo
    </td>
    <Td>
        <input type="text" id="ID_PRAZO_PRORROGACAO" name="PRAZO_PRORROGACAO" onblur="calculo();" size="10" value="<?php echo $_GET['PRAZO_PRORROGACAO'];?>">
    </td>
</tr>
<tr>
    <Td>
        Prest. Emitidas
    </td>
    <Td>
        <input type="text" disabled="true" name="NU_PRESTACAO_EMITIDAS" size="10" value="0">
    </td>
</tr>
<tr>
    <Td>
        Saldo de Prestaçőes
    </td>
    <Td>
        <input type="text" disabled="true" id="ID_NU_PRESTACAO" name="NU_PRESTACAO" size="10" value="<?php $NU_PRESTACAO = $_GET['PRAZO_AMORTIZACAO'] + $_GET['PRAZO_PRORROGACAO']; echo $NU_PRESTACAO;?>">
    </td>
</tr>
<tr>
    <Td>
        Data de assinatura
    </td>
    <Td>
        <input type="text" name="DT_ASSINATURA" id="ID_DT_ASSINATURA" size="10" value="<?php echo $_GET['DT_ASSINATURA'];?>">
    </td>
</tr>
<tr>
    <Td>
        Data de vencimento
    </td>
    <Td>
        <input type="text" name="DT_VENCIMENTO" id="ID_DT_VENCIMENTO" size="10" value="<?php echo $_GET['DT_VENCIMENTO'];?>">
    </td>
</tr>
<tr>
    <Td>
        Nu. Regra de Evoluçăo
    </td>
    <Td>
        <input type="text" name="NU_REGRA_EVOLUCAO" size="10" value="<?php echo $_GET['NU_REGRA_EVOLUCAO'];?>">
    </td>
</tr>
<tr>
    <Td>
        Apólice
    </td>
    <Td>
        <input type="text" name="APOLICE" maxlength="6" size="10" value="<?php echo $_GET['APOLICE'];?>">
    </td>
</tr>
<tr>
    <Td>
        Seguradora
    </td>
    <Td>
        <input type="text" name="SEGURADORA" size="10" value="<?php echo $_GET['SEGURADORA'];?>">
    </td>
</tr>
<tr>
    <Td>
        Pact. de Renda
    </td>
    <Td>
        <input disabled="true" type="text" name="PAC_RENDA" id="ID_PAC_RENDA" size="10" value="<?php echo $_GET['PAC_RENDA'];?>">
    </td>
</tr>
</table>
<div align="center">
     <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
</div>
</form>
<script>
selectSet('ID_SIS_AMORTIZACAO', <?php echo $_GET['SIS_AMORTIZACAO'];?>);
</script>
</div>
</body>
</html>
<?php
}
?>
