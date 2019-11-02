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
<body onload="changeUrl();">
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
            <span>Consultar Eventos</span>
        </div>

        <div id="conteudo" class="grid_9 scroll omega">
            <div id="menu-superior">
                <ul>
                    <li><a href="consulta_fatos.php?height=500&width=900&modal=true" class="thickbox"><img src="../imagens/icones/ferramenta_sintatica.png"/></a></li>
                    <li><a href="consulta_evento_filtro.php"><img src="../imagens/icones/eventos.png"/></a></li>
                </ul>

            </div>
            <div id="formulario">
                <form method="get" action="consulta_evento.php">
                    <input type="hidden" name="sistema" value="0">
                    <table>
                        <tr>
                            <td><label>Momento: </label></td><td><select name="momento" id="id_momento" onchange="changeUrl();"><option value="0">Todos</option><?php foreach (Misc::getMomentosList() as $option) {echo $option;} ?></select></td>
                        </tr>
                        <tr>
                            <td><label>Situa&ccedil;&atilde;o: </label></td><td><select name="situacao" id="id_situacao" onchange="changeUrl();"><option value="todos">Todos</option><option value="ncancelados">N&atilde;o cancelados</option><option value="cancelados">Cancelados</option></select></td></tr>
                        <td><label>Vigencia: </label></td><Td><select name="vigencia" id="id_vigencia" onchange="changeUrl();"><option value="todos">Todos</option><option value="vigentes">Vigentes</option><option value="nvigentes">N&atilde;o vigentes</option></select></td>
                        </tr>
                    </table>
                    <div align="center">
                        <input type="image" src="../imagens/botao-confirma.png">
                    </div>
                </form>
            </div>
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
