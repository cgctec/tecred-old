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
     <a href="<?php echo $_GET['location']."?height=300&width=300&modal=true&NU_PRODUTO=".$_GET['NU_PRODUTO']."&NO_PRODUTO=".urlencode($_GET['NO_PRODUTO'])."&DT_INICIO=".urlencode($_GET['DT_INICIO'])."&DT_FIM=".urlencode($_GET['DT_FIM']);?>" class="thickbox"><img src="../imagens/edit.png" border="0" height="50" width="50"></a>
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
