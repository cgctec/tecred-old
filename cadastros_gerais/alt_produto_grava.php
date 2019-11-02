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
			<span>Produtos</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                            <div id="menu-superior">
				<ul>
                                                  <li><a href="inc_produto.php?height=300&width=300&modal=true" class="thickbox"><img width="50" heigth="50" src="../imagens/adicionar.png"/></a></li>
					<li><a href="#"><img width="50" heigth="50" src="../imagens/alterar.png"/></a></li>
					<li><a href="#"><img width="50" heigth="50" src="../imagens/delete.png"/></a></li>
				</ul>
                             </div>
  <style>
                            .top
                            {
                                 background:#000000;
                                 border: 1px solid green;
                            }
                            </style>
                            <form name="produtos">
                            <table width="100%">
                            <tr>
                                <Td class="top">-</td>
                                <td class="top">Codigo</td>
                                <td class="top" >Nome</td>
                                <td class="top">Inicio</td>
                                <td class="top">Término</td>
                                <td class="top">Excluido</td>
                            </tr>
                            <?php
                                 foreach(Misc::getTabelaProdutosList() as $NU_PRODUTO)
                                 {
                                       $produto = new ProdutoS($NU_PRODUTO);
                                       echo '
                                       <tr>
                                           <td><input type="radio" name="NU_PRODUTO" value="'.$NU_PRODUTO.'"></td>
                                           <td>'.$produto->NU_PRODUTO.'</td>
                                           <td style="text-align:left;">'.$produto->NO_PRODUTO.'</td>
                                           <td>'.$produto->DT_INICIO.'</td>
                                           <td>'.$produto->DT_FIM.'</td>
                                           <td>'.$produto->IC_CANCELADO.'</td>
                                       </tr>
                                       ';
                                 }
                            ?>
                            </table>
                            </form>
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
$data_inicio = @strtotime(str_replace("/", "-" ,$_POST['DT_INICIO']));
$data_fim = @strtotime(str_replace("/", "-" ,$_POST['DT_FIM']));
$produto = new Produtos($_POST['NU_PRODUTO']);
$produto->NO_PRODUTO = $_POST['NO_PRODUTO'];
$produto->DT_INICIO = $data_inicio;
$produto->DT_FIM = $data_fim;
if ($produto->salvar())
   echo '<script>openBox("produto_ok.php?height=100&width=80&modal=true");</script>';
else
   echo "<script>openBox('produto_return.php?height=200&width=380&modal=true&return=".urlencode($produto->errorstr)."&NU_PRODUTO=".$_POST['NU_PRODUTO']."&NO_PRODUTO=".urlencode($_POST['NO_PRODUTO'])."&DT_INICIO=".urlencode($_POST['DT_INICIO'])."&DT_FIM=".urlencode($_POST['DT_FIM'])."&location=".urlencode("alt_produto.php")."');</script>";

?>
