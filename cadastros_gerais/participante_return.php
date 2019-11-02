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
     <a href="<?php echo $_GET['destino']."?height=500&width=700&modal=true&id=".$_GET['id']."&NU_CONTRATO=".$_GET['NU_CONTRATO']."&TIPO_PARTICIPANTE=".urlencode($_GET['TIPO_PARTICIPANTE'])."&NOME_PARTICIPANTE=".urlencode($_GET['NOME_PARTICIPANTE'])."&DT_NASCIMENTO=".urlencode($_GET['DT_NASCIMENTO'])."&origem_destino=".urlencode($_GET['origem_destino'])."&endereco=".urlencode($_GET['endereco'])."&numero=".urlencode($_GET['numero'])."&complemento=".urlencode($_GET['complemento'])."&bairro=".urlencode($_GET['bairro'])."&cidade=".urlencode($_GET['cidade'])."&estado=".urlencode($_GET['estado'])."&telefone=".urlencode($_GET['telefone'])."&cep=".urlencode($_GET['cep'])."&cpf_cnpj=".urlencode($_GET['cpf_cnpj'])."&email=".urlencode($_GET['email'])."&renda=".urlencode($_GET['renda']);?>" class="thickbox"><img src="../imagens/edit.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     <tr>
     <td>
     Voltar:
     </td>
     <td>
     <a href="produtos.php"><img src="../imagens/menu-voltar.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     </table>
</div>
</body>
</html>
