<?php session_start(); include 'head.php';?>
<script>
function openBox(url)
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, url, false);
}
</script>
<body>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Inclusões</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
					<li><a href="inc_elemento_form.php"><img src="../imagens/elementos.png"/></a></li>
					<li><a href="inc_evento.php?height=500&width=590&modal=true" class="thickbox"><img src="../imagens/eventos.png"/></a></li>
                                                  <li><a href="inc_momento.php"><img src="../imagens/momento.png"/></a></li>
					<li><a href="inc_roteiro.php"><img src="../imagens/roteiro.png"/></a></li>
					<li><a href="inc_usuario.php"><img src="../imagens/usuario.png"/></a></li>
				</ul>
			</div>
			<div id="lol">
                              Selecione um item no menu superior.
                              </div>
		</div>
		<!-- fim do conteudo -->
		<div id="logo" class="grid_12 alpha omega">
   		</div>
	</div>
</body>
</html>
<?php
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$fail = array();
for ($i = 1; $i <= 4; $i++)
{
	switch ($i)
	{
		case 1:
			$cod1 = $_POST['codigo1'];
			$cod2 = $_POST['codigo2'];
			$cod3 = $_POST['codigo3'];
			$cod4 = $_POST['codigo4'];
			$cod5 = $_POST['codigo5'];
			break;
		case 2:
			$cod1 = $_POST['codigo1'] + 1000;
			$cod2 = $_POST['codigo2'];
			$cod3 = $_POST['codigo3'];
			$cod4 = $_POST['codigo5'];
			$cod5 = $_POST['codigo4'];
			break;
		case 3:
			$cod1 = $_POST['codigo1'] + 2000;
			$cod2 = $_POST['codigo2'];
			$cod3 = $_POST['codigo3'];
			$cod4 = $_POST['codigo4'];
			$cod5 = $_POST['codigo5'];
			break;
		case 4:
			$cod1 = $_POST['codigo1'] + 3000;
			$cod2 = $_POST['codigo2'];
			$cod3 = $_POST['codigo3'];
			$cod4 = $_POST['codigo5'];
			$cod5 = $_POST['codigo4'];
			break;
	}
	$incluir = new Roteiro($_POST['ffrase'.$i], $cod1, $cod2, $cod3, $cod4, $cod5, $_POST['rotulo'.$i]);
	if (!$incluir->addRoteiro())
	{
		$errorstr = $incluir->errorstring;
		$fail[] = $i;
	}
}
if (!$fail[0])
{
echo '<script>openBox("http://localhost/tito/banpress/evento_ok.php?height=100&width=80&modal=true");</script>';
}
else
{
echo "<script>openBox('evento_return.php?height=200&width=380&modal=true&return=".urlencode($errorstr)."&cod1=".urlencode($_POST['codigo1'])."&cod2=".urlencode($_POST['codigo2'])."&cod3=".urlencode($_POST['codigo3'])."&cod4=".urlencode($_POST['codigo4'])."&cod5=".urlencode($_POST['codigo5'])."');</script>";
}
?>
