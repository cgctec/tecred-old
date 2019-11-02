<?php
session_start();
require_once("../classe/class.php");
$usuario = new Usuario($_SESSION['user'], null);
$consulta = new Consulta_Fatos();
$consulta->MakeLines();
if (!$usuario->securityVerify())
{
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editara">
<script>
jQuery(function($){
   $("#cpf_id").mask("999.999.999-99");
});
</script>
<script>
</script>
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
<div id="box-editar">
<a href="#" onclick="tb_remove();"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Ferramenta Sint&aacute;tica Auxiliar</span>
<table>

    <tr style="border: 1px solid black;">
		<td>#</td><td><center><font size="6">A&Ccedil;&Aacute;O</font></center></td><td>#</td><td><center><font size="6">OBJETO</font></center></td><td>#</td><td><center><font size="6">ALVO</font></center></td><td>#</td><td><center><font size="6">ORIGEM</font></center></td><td>#</td><td><center><font size="6">DESTINO</font></center></td>
    </tr>
    <?php
    foreach ($consulta->lines as $line)
    {
	echo '<tr>
	          '.$line.'
                </tr>';

    }
    echo '</table>';
    ?>
</table>
</div>
</body>
</html>
<?php
}
?>
