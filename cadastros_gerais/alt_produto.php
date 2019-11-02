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
$produto = new Produtos($_GET['NU_PRODUTO']);
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<script>
jQuery(function($){
   $("#ID_DT_INICIO").mask("99/99/9999");
   $("#ID_DT_FIM").mask("99/99/9999");
});
</script>
<div id="box-editara">
<a href="produtos.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Alterar Produto</span>
<form  method="post" action="alt_produto_grava.php" name="form">
<input type="hidden" name="NU_PRODUTO" value="<?php echo $_GET['NU_PRODUTO'];?>">
<table>
<Tr>
    <Td style="">
        Nome
    </td>
    <Td>
        <input type="text" name="NO_PRODUTO" value="<?php if (!$_GET['NO_PRODUTO']) echo $produto->NO_PRODUTO; else echo $_GET['NO_PRODUTO'];?>">
    </td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
    <Td>
        Data Inicio
    </td>
    <Td>
        <input type="text" name="DT_INICIO" id="ID_DT_INICIO" size="6" value="<?php if (!$_GET['DT_INICIO']) echo $produto->DT_INICIO; else echo $_GET['DT_INICIO'];?>">
    </td>
</tr>
<tr>
    <Td>
        Data Final
    </td>
    <Td>
        <input type="text" name="DT_FIM" id="ID_DT_FIM" size="6" value="<?php if (!$_GET['DT_FIM']) echo $produto->DT_FIM; else echo $_GET['DT_FIM'];?>">
    </td>
</tr>
</table>
<div align="center">
     <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
</div>
</form>
</div>
</body>
</html>
<?php
}
?>
