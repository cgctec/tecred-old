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
	header('Location: security_error.html');
}
$cadastro = new Cadastro($_GET['nome'], $_GET['cpf'], $_GET['endereco'], $_GET['bairro'], $_GET['cidade'], $_GET['estado'], $_GET['email'], $_GET['cargo'], $_GET['id'], $_GET['pass'], $_GET['consultar'], $_GET['incluir'], $_GET['manutencao'], $_GET['excluir']);
$cadastro->addUser();
echo "<script>openBox('usuario_return.php?height=200&width=380&modal=true&return=".urlencode("Usuário incluido com sucesso")."')</script>";
?>
