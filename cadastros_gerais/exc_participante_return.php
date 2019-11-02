<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editar">
     Operaçăo năo realizada.<BR>
     O participante năo pode ser excluido porque pertence ao(s) contrato(s) de número:<BR>
     <?php
          $contratos = unserialize($_GET['return']);
          for ($i = 0; $i < count($contratos); $i++)
          {
               if ($i == (count($contratos) - 1))
                   echo $contratos[$i] . ".";
               else
                   echo $contratos[$i] . ", ";
          }
     ?>
     <BR>
     <div align="center">
     <a href="#" onclick="tb_remove();"><img src="../imagens/ok.png" border="0" height="50" width="50"></a>
     </div>
</div>
</body>
</html>
