<?php session_start(); include 'head.php';?>
<script>
function openBox(url)
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, url, false);
}
function get_radio_value()
{
for (var i=0; i < document.produtos.NU_PRODUTO.length; i++)
   {
   if (document.produtos.NU_PRODUTO[i].checked)
      {
      var rad_val = document.produtos.NU_PRODUTO[i].value;
      return rad_val;
      }
   }
}
function Alterar()
{
openBox('alt_produto.php?height=300&width=500&modal=true&NU_PRODUTO=' + get_radio_value());
}
</script>
<body>
                    <div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Produtos</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">

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
$produto = new Produtos(null);
$produto->NO_PRODUTO = $_POST['NO_PRODUTO'];
$produto->DT_INICIO = $data_inicio;
$produto->DT_FIM = $data_fim;
if ($produto->salvar())
   echo '<script>openBox("produto_ok.php?height=100&width=80&modal=true");</script>';
else
   echo "<script>openBox('produto_return.php?height=200&width=380&modal=true&return=".urlencode($produto->errorstr)."&NO_PRODUTO=".urlencode($_POST['NO_PRODUTO'])."&DT_INICIO=".urlencode($_POST['DT_INICIO'])."&DT_FIM=".urlencode($_POST['DT_FIM'])."&location=".urlencode("inc_produto.php")."');</script>";

?>
