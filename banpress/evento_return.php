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
     <a href="<?php echo "inc_evento.php?height=500&width=590&modal=true&cod1=".$_GET['cod1']."&cod2=".$_GET['cod2']."&cod3=".$_GET['cod3']."&cod4=".$_GET['cod4']."&cod5=".$_GET['cod5'].""?>" class="thickbox"><img src="../imagens/edit.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     <tr>
     <td>
     Voltar:
     </td>
     <td>
     <a href="incluir.php"><img src="../imagens/menu-voltar.png" border="0" height="50" width="50"></a>
     </td>
     </tr>
     </table>
</div>
</body>
</html>
