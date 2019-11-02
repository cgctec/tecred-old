<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
	<title>BANPRESS</title>
	<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/text.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/thickbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />

	<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/thickbox.js"></script>
	<script type="text/javascript" src="../js/jScrollPane.js"></script>
	<script type="text/javascript" src="../js/inc_evento.js"></script>
	<script type="text/javascript" src="../js/mask.js"></script>
	<script type="text/javascript">
	$(function()
	{
	$('#conteudo').jScrollPane({showArrows:true, scrollbarWidth: 13, arrowSize: 16});
	});
	</script>


</head>
<?php
require_once('../classe/class.php');
if (isset($_POST['form']))
{
	$usuario = new Usuario($_POST['nome'], $_POST['pass']);
	$matricula = $usuario->Login();
	if ($matricula)
	{
		$_SESSION['user'] = $matricula;
 	}
	else
	{
		$error = 'Nome e senha não conferem';
	}
}
?>
<body>
	<div class="container_12">
		<!-- menu lateral -->
		<?php
		$usuario = new Usuario($_SESSION['user'], null);
		if (!$_SESSION['user'] || !$usuario->securityVerify())
		{
		if (!$_SESSION['user'])
		{
		?>
		<div id="login-lateral" class="grid_2">
		<form method="post" action="index.php">
		<input type="hidden" name="form" value="1">
			<ul>
				<li>
					<label class="sfloat">Login</label>
					<input type="text" name="nome"/>
				</li>
				<li>
					<label class="sfloat">Senha</label>
					<input type="password" name="pass"/>
				</li>
				<li>
					<!--<span class="botao-especial" style="float: left;"><a href="incluir.php">Entrar</a></span>-->
					<input type="image" src="../imagens/bg-botao.png" value="Enviar">
				</li>
			</ul>
			<?php
                              if ($error)
                              {
	                       echo $error;
                              }
                              ?>
                    </form>
		</div>
		<?php
		}
		else
		{
                    echo '<div id="menu-lateral" class="grid_2"><ul>
                    <li><a href="consultar.php">Consultar</a></li>
                    <li><a href="incluir.php">Incluir</a></li>
                    <li><a href="e_sistema_form.php">Manutencao</a></li>
                    <li><a href="excluir.php">Excluir</a></li>
                    <li><a href="../">Voltar</a></li>
                    </ul></div>';
		}
		?>
   		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Gestao de Emprestimos</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
			<?php
            print_r(str_replace('/banpress', '', $_SERVER['PHP_SELF']));
			if (str_replace('/banpress', '', $_SERVER['PHP_SELF']) != "/index.php")
				echo '<p>Pagina restrita, caso ja tenha efetuado login se reporte ao seu supervisor para que ele libere o acesso a essa pagina.</p>';
			else
				echo '<p>Efetue login para começar a usar o sistema</p>';
			?>
		</div>
		<!-- fim do conteudo -->
		<div id="logo" class="grid_12 alpha omega">
 		</div>
	          </div>
                    </body>
                    </html>
		<?php
                    die();
                    }
                    else
                    {
                    echo '<div id="menu-lateral" class="grid_2"><ul>
                    <li><a href="consultar.php">Consultar</a></li>
                    <li><a href="incluir.php">Incluir</a></li>
                    <li><a href="e_sistema_form.php">Manutenção</a></li>
                    <li><a href="excluir.php">Excluir</a></li>
                    <li><a href="../">Voltar</a></li>
                    </ul></div>';
                    }
 		?>
