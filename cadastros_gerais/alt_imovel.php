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
$imovel = new Imoveis($_GET['id']);
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<script>
jQuery(function($){
    $("#id_cep").mask("99999-999");
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
</script>
<div id="box-editara">
<a href="imoveis.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Alterar Imóvel</span>
<form  method="post" action="alt_imovel_grava.php" name="form">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
<table>
<tr>
    <td>
        Nu. Contrato
    </td>
    <td>
        <input disabled="true" type="text" size="5" value="<?php echo $imovel->NU_CONTRATO;?>">
    </td>
</tr>
<Tr>
    <Td>
        Valor Avaliaçăo
    </td>
    <Td>
        <input type="text" size="15" name="VL_AVALIACAO" value="<?php if($_GET['VL_AVALIACAO']) {echo $_GET['VL_AVALIACAO'];} else {echo $imovel->VL_AVALIACAO;}?>">
    </td>
</tr>
<Tr>
    <Td style="">
        Valor Venda
    </td>
    <Td>
        <input type="text" size="15" name="VL_VENDA" value="<?php if($_GET['VL_VENDA']) {echo $_GET['VL_VENDA'];} else {echo $imovel->VL_VENDA;}?>">
    </td>
</tr>
<Tr>
    <Td style="">
        Valor Venal
    </td>
    <Td>
        <input type="text" size="15" name="VL_VENAL" value="<?php if($_GET['VL_VENAL']) {echo $_GET['VL_VENAL'];} else {echo $imovel->VL_VENAL;}?>">
    </td>
</tr>
<Tr>
    <Td style="">
        Valor Bruto
    </td>
    <Td>
        <input type="text" size="15" name="VL_BRUTO" value="<?php if($_GET['VL_BRUTO']) {echo $_GET['VL_BRUTO'];} else {echo $imovel->VL_BRUTO;}?>">
    </td>
</tr>
<Tr>
    <Td style="">
        Valor Renda
    </td>
    <Td>
        <input type="text" size="15" name="VL_RENDA" value="<?php if($_GET['VL_RENDA']) {echo $_GET['VL_RENDA'];} else {echo $imovel->VL_RENDA;}?>">
    </td>
</tr>
<Tr>
    <Td style="">
        Registro
    </td>
    <Td>
        <input type="text" size="15" name="registro" value="<?php if($_GET['registro']) {echo $_GET['registro'];} else {echo $imovel->registro;}?>">
    </td>
</tr>
<tr>
    <Td>
        Endereço
    </td>
    <Td>
        <input type="text" name="endereco" value="<?php if($_GET['endereco']) {echo $_GET['endereco'];} else {echo $imovel->endereco;}?>">
    </td>
</tr>
<tr>
    <td>
        Num.
    </td>
    <td>
        <input type="text" name="numero" size="2" value="<?php if($_GET['numero']) {echo $_GET['numero'];} else {echo $imovel->numero;}?>">
    </td>
</tr>
<Tr>
    <td>
        Complemento
    </td>
    <td>
        <input type="text" name="complemento" size="10" value="<?php if($_GET['complemento']) {echo $_GET['complemento'];} else {echo $imovel->complemento;}?>">
    </td>
</tr>
<tr>
    <td>
        Bairro
    </td>
    <td>
        <input type="text" name="bairro" size="10" value="<?php if($_GET['bairro']) {echo $_GET['bairro'];} else {echo $imovel->bairro;}?>">
    </td>
    <td>
        Cidade
    </td>
    <td>
        <input type="text" name="cidade" size="10" value="<?php if($_GET['cidade']) {echo $_GET['cidade'];} else {echo $imovel->cidade;}?>">
    </td>
    <td>
        Estado
    </td>
    <td>
        <select id="sel_estado" name="estado">
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AM">AM</option>
                <option value="AP">AP</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="PR">PR</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="RS">RS</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP">SP</option>
                <option value="TO">TO</option>
       </select>
    </td>
</tr>
<tr>
    <td>
        CEP
    </td>
    <td>
        <input type="text" name="cep" id="id_cep" size="10" value="<?php if($_GET['cep']) {echo $_GET['cep'];} else {echo $imovel->cep;}?>">
    </td>
</tr>
<tr>
    <td>
        Classificaçăo
    </td>
    <td>
        <select name="padrao" id="id_padrao">
        <?php
              foreach(Misc::listaImoveisPadrao() as $tipo)
              {
                     echo $tipo;
              }
        ?>
        </select>
    </td>
</tr>
<tr>
    <td>
        Tipo de Imóvel
    </td>
    <td>
        <select name="TIPO_CONSTRUCAO" id="ID_TIPO_CONSTRUCAO">
        <?php
              foreach(Misc::listaImoveisTipo() as $tipo)
              {
                     echo $tipo;
              }
        ?>
        </select>
    </td>
</tr>
</table>
<div align="center">
     <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
</div>
</form>
<script>
selectSet('ID_TIPO_CONSTRUCAO', <?php if($_GET['TIPO_CONSTRUCAO']) {echo $_GET['TIPO_CONSTRUCAO'];} else {echo $imovel->tipoConstrucao($imovel->tipo,true);}?>);
selectSet('id_padrao', <?php if($_GET['padrao']) {echo $_GET['padrao'];} else {echo $imovel->tipoPadrao($imovel->padrao,true);}?>);
selectSet('sel_estado', '<?php if($_GET['estado']) {echo $_GET['estado'];} else {echo $imovel->estado;}?>');
</script>
</div>
</body>
</html>
<?php
}
?>
