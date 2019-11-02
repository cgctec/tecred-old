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
 echo 'Conteudo Restrito';
}
$sl = $_POST['sl'];
$cod_contabil = $_POST['cod_contabil'];
$in_vigencia = @strtotime($_POST['in_vigencia']);
$fim_vigencia = @strtotime($_POST['fim_vigencia']);
$uid = $_POST['uid'];
//echo $_POST['sistema'];
//echo $uid;
$sql = new Sql();
$con = $sql->connect();
$sistema = 'SELECT DISTINCT sistemas.nome as nome FROM roteiro_sistema_momento INNER JOIN sistemas ON roteiro_sistema_momento.cod_sistema = sistemas.codigo WHERE roteiro_sistema_momento.cod_roteiro = '.$uid.';';
//echo $sistema;
$result = mysql_query($sistema, $con);
$enabled = @mysql_result($result, 0);
//echo $enabled;
if (!$enabled)
{
	mysql_query('UPDATE roteiro SET sl = '.$sl.', codigo_contabil = "'.$cod_contabil.'", inicio_vigencia = '.$in_vigencia.', fim_vigencia = '.$fim_vigencia.' WHERE uid = '.$uid.';', $con);
	$sql->close();
          echo '<script>openBox("alt_evento_form.php?height=300&width=500&modal=true&uid='.$_POST['uid'].'&filter1='.$_POST['sistema'].'&filter2='.$_POST['momento'].'&filter3='.$_POST['situacao'].'&filter4='.$_POST['vigencia'].'&return=1");</script>';
          //echo 'teste 1';
}
else
{
	$return = 'Não se pode alterar este roteiro, pois ele pertence aos seguintes sistemas:<br />';
	$return = $return . $enabled.'<br />';
	//echo $return;
	while ($fetch = mysql_fetch_array($result))
	{
		$return = $return . $fetch['nome'].'<br />';
	}
	//echo $return;
          echo '<script>openBox("alt_evento_form.php?height=300&width=500&modal=true&uid='.$_POST['uid'].'&filter1='.$_POST['sistema'].'&filter2='.$_POST['momento'].'&filter3='.$_POST['situacao'].'&filter4='.$_POST['vigencia'].'&return='.urlencode($return).'");</script>';
          //echo 'teste 2';
}
$sql->close();
?>
