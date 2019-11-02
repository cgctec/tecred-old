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
     <a href="<?php echo $_GET['destino']."?height=500&width=700&modal=true&id=".$_GET['id']."&NU_CONTRATO=".$_GET['NU_CONTRATO']."&VL_AVALIACAO=".urlencode($_GET['VL_AVALIACAO'])."&VL_VENDA=".urlencode($_GET['VL_VENDA'])."&VL_VENAL=".urlencode($_GET['VL_VENAL'])."&VL_BRUTO=".urlencode($_GET['VL_BRUTO'])."&VL_RENDA=".urlencode($_GET['VL_RENDA'])."&registro=".urlencode($_GET['registro'])."&endereco=".urlencode($_GET['endereco'])."&numero=".urlencode($_GET['numero'])."&complemento=".urlencode($_GET['complemento'])."&bairro=".urlencode($_GET['bairro'])."&cidade=".urlencode($_GET['cidade'])."&estado=".urlencode($_GET['estado'])."&cep=".urlencode($_GET['cep'])."&padrao=".$_GET['padrao']."&TIPO_CONSTRUCAO=".$_GET['TIPO_CONSTRUCAO'];?>" class="thickbox"><img src="../imagens/edit.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     <tr>
     <td>
     Voltar:
     </td>
     <td>
     <a href="imoveis.php"><img src="../imagens/menu-voltar.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     </table>
</div>
</body>
</html>
