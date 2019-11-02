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
<a href="seguradoras.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
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
<div id="box-editara">
<a href="seguradoras.php"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Cotaçăo da Seguradora</span>
<table border="1" width="80%">
<Tr>
<Td>
Modalidade
</td>
<Td>
Taxa
</td>
<Td>
Inicio
</td>
<Td>
Término
</td>
</tr>
<?php
$COD_SEGURADORA = $_GET['id'];
$sql = new Sql();
$con = $sql->connect();
$result = mysql_query("SELECT * FROM historico_seguradora WHERE COD_SEGURADORA = ".$COD_SEGURADORA." ORDER BY `TIPO_SEGURO` ASC, `INICIO` ASC;",$con);
//echo "SELECT * FROM historico_seguradora WHERE COD_SEGURADORA = ".$COD_SEGURADORA." ORDER BY `TIPO_SEGURO` ASC, `INICIO` ASC;";
while ($fetch = mysql_fetch_array($result))
{
$inicio = @date('d/m/Y', @strtotime($fetch['INICIO']));
$fim = @date('d/m/Y', @strtotime($fetch['FIM']));
echo '<tr><td>'.$fetch['TIPO_SEGURO'].'</td><Td>'.$fetch['TAXA'].'%</td><Td>'.$inicio.'</td><td>'.$fim.'</td></tr>';
}
$sql->close();
?>
</table>
</div>
</body>
</html>
<?php
}
?>
