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
   $("#ID_DT_INICIO").mask("99/99/9999");
   $("#ID_DT_FIM").mask("99/99/9999");
   $("#id_telefone").mask("(99) 9999-9999");
   $("#id_cep").mask("99999-999");
   $("#id_cnpj").mask("99.999.999/9999-99");
   $("#id_cpf").mask("999.999.999-99");
   $("#id_renda").mask("999.99%");
   $("#ID_DT_NASCIMENTO").mask("99/99/9999");
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
function tipoCadastro()
{
	if (document.getElementById('sel_cadastro').selectedIndex == 0)
	{
		document.getElementById('cadastro_id').innerHTML = '<input type="text" name="cpf_cnpj" id="id_cpf" >';
		jQuery(function($){
   $("#ID_DT_INICIO").mask("99/99/9999");
   $("#ID_DT_FIM").mask("99/99/9999");
   $("#id_telefone").mask("(99) 9999-9999");
   $("#id_cep").mask("99999-999");
   $("#id_cnpj").mask("99.999.999/9999-99");
   $("#id_cpf").mask("999.999.999-99");
});
	}
	if (document.getElementById('sel_cadastro').selectedIndex == 1)
	{
		document.getElementById('cadastro_id').innerHTML = '<input type="text" name="cpf_cnpj" id="id_cnpj" >';
		jQuery(function($){
   $("#ID_DT_INICIO").mask("99/99/9999");
   $("#ID_DT_FIM").mask("99/99/9999");
   $("#id_telefone").mask("(99) 9999-9999");
   $("#id_cep").mask("99999-999");
   $("#id_cnpj").mask("99.999.999/9999-99");
   $("#id_cpf").mask("999.999.999-99");
});
	}
}
</script>
<div id="box-editara">
<a href="participantes.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Incluir Participante</span>
<form  method="post" action="inc_participante_grava.php" name="form">
<table>
<tr>
    <td>
        Nu. Contrato
    </td>
    <td>
        <input name="NU_CONTRATO" type="text" size="5" value="<?php echo $_GET['NU_CONTRATO'];?>">
    </td>
</tr>
<tr>
    <td>
        Tipo
    </td>
    <td>
        <select name="TIPO_PARTICIPANTE" id="ID_TIPO_PARTICIPANTE">
        <?php
              foreach(Misc::listaTiposParticipante() as $tipo)
              {
                     echo $tipo;
              }
        ?>
        </select>
    </td>
</tr>
<Tr>
    <Td style="">
        Nome
    </td>
    <Td>
        <input type="text" name="NOME_PARTICIPANTE" value="<?php echo $_GET['NOME_PARTICIPANTE'];?>">
    </td>
</tr>
<Tr>
    <Td style="">
        Data de Nascimento
    </td>
    <Td>
        <input type="text" id="ID_DT_NASCIMENTO" name="DT_NASCIMENTO" value="<?php echo $_GET['DT_NASCIMENTO'];?>">
    </td>
</tr>
<tr>
    <Td>
        Endereço
    </td>
    <Td>
        <input type="text" name="endereco" value="<?php echo $_GET['endereco'];?>">
    </td>
</tr>
<tr>
    <td>
        Num.
    </td>
    <td>
        <input type="text" name="numero" size="2" value="<?php echo $_GET['numero'];?>">
    </td>
</tr>
<Tr>
    <td>
        Complemento
    </td>
    <td>
        <input type="text" name="complemento" size="10" value="<?php echo $_GET['complemento'];?>">
    </td>
</tr>
<tr>
    <td>
        Bairro
    </td>
    <td>
        <input type="text" name="bairro" size="10" value="<?php echo $_GET['bairro'];?>">
    </td>
    <td>
        Cidade
    </td>
    <td>
        <input type="text" name="cidade" size="10" value="<?php echo $_GET['cidade'];?>">
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
        Telefone
    </td>
    <td>
        <input type="text" name="telefone" id="id_telefone" size="10" value="<?php echo $_GET['telefone'];?>">
    </tr>
</tr>
<tr>
    <td>
        CEP
    </td>
    <td>
        <input type="text" name="cep" id="id_cep" size="10" value="<?php echo $_GET['cep'];?>">
    </tr>
</tr>
<tr>
    <td>
       CPF/CNPJ
    </td>
    <td>
        <select id="sel_cadastro" onchange="tipoCadastro()">
             <option>Pessoa física</option>
             <option>Pessoa jurídica</option>
        </select>
    </td>
    <td id="cadastro_id">
        <input type="text" name="cpf_cnpj" id="id_cpf">
    </td>
</tr>
<tr>
    <td>
        E-Mail
    </td>
    <td>
        <input type="text" name="email" value="<?php echo $_GET['email'];?>">
    </td>
    <td>
        Participaçăo na renda
    </td>
    <td>
        <input type="text" name="renda" id="id_renda" size="5" value="<?php echo $_GET['renda'];?>">
    </tr>
</tr>
</table>
<div align="center">
     <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
</div>
</form>
<script>
selectSet('ID_TIPO_PARTICIPANTE', <?php echo $_GET['TIPO_PARTICIPANTE'];?>);
selectSet('sel_estado', '<?php echo $_GET['estado'];?>');
</script>
</div>
</body>
</html>
<?php
}
?>
