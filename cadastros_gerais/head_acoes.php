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
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="contratos.php">Contratos</a></li>
                    <li><a href="participantes.php">Participantes</a></li>
                    <li><a href="imoveis.php">Im&oacute;veis</a></li>
                    <li><a href="consulta_acoes.php">A&ccedil;&atilde;es de Bloqueio</a></li>
                    <li><a href="../">Voltar</a></li>
                    </ul></div>';
		}
		?>
        <div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
            <span>Consulta a&ccedil;&atilde;es de bloqueio</span>
        </div>
        <div id="conteudo" class="grid_9 scroll omega">
            <form name="produtos" action="exc_produto.php">
                <div id="menu-superior">
                    <ul>
                        <li>&nbsp;</li>
                    </ul>

                </div>
                <style>
                    .top {
                        background: #000000;
                        border: 1px solid green;
                    }
                </style>
                <Center>
                    <table width="70%">
                        <tr>
                            <td class="top">Codigo</td>
                            <td class="top">Nome</td>
                        </tr>
                        <?php
                        $misc = new Misc();
                        $acoes = $misc->getAcoesList();
                        foreach ($acoes as $codigo) {
                            $acao = new Acoes($codigo);
                            echo '
                                       <tr>
                                           <td>' . $acao->codigo . '</td>
                                           <td style="text-align:left;">' . $acao->nome . '</td>
                                       </tr>
                                       ';
                        }
                        ?>
                    </table>
                </center>
            </form>
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
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="contratos.php">Contratos</a></li>
                    <li><a href="participantes.php">Participantes</a></li>
                    <li><a href="seguradoras.php">Seguradoras</a></li>
                    <li><a href="imoveis.php">Im&oacute;veis</a></li>
                    <li><a href="consulta_acoes.php">A&ccedil;&atilde;es de Bloqueio</a></li>
                    <li><a href="../">Voltar</a></li>
                    </ul></div>';
                    }
 		?>
