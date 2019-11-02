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
			<span>Participantes</span>
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
$imovel = new Imoveis($_POST['id']);
$imovel->VL_AVALIACAO = $_POST['VL_AVALIACAO'];
$imovel->VL_VENDA = $_POST['VL_VENDA'];
$imovel->VL_VENAL = $_POST['VL_VENAL'];
$imovel->VL_BRUTO = $_POST['VL_BRUTO'];
$imovel->VL_RENDA = $_POST['VL_RENDA'];
$imovel->registro = $_POST['registro'];
$imovel->endereco = $_POST['endereco'];
$imovel->numero = $_POST['numero'];
$imovel->complemento = $_POST['complemento'];
$imovel->bairro = $_POST['bairro'];
$imovel->cidade = $_POST['cidade'];
$imovel->estado = $_POST['estado'];
$imovel->cep = $_POST['cep'];
$imovel->padrao = $_POST['padrao'];
$imovel->tipo = $_POST['TIPO_CONSTRUCAO'];
if ($imovel->salvar())
{
   echo '<script>openBox("imovel_ok.php?height=100&width=80&modal=true");</script>';
}
else
   echo "<script>openBox('imovel_return.php?height=200&width=380&modal=true&destino=".urlencode("alt_imovel.php")."&id=".$_POST['id']."&return=".urlencode($imovel->errorstr)."&VL_AVALIACAO=".urlencode($_POST['VL_AVALIACAO'])."&VL_VENDA=".urlencode($_POST['VL_VENDA'])."&VL_VENAL=".urlencode($_POST['VL_VENAL'])."&VL_BRUTO=".urlencode($_POST['VL_BRUTO'])."&VL_RENDA=".urlencode($_POST['VL_RENDA'])."&registro=".urlencode($_POST['registro'])."&endereco=".urlencode($_POST['endereco'])."&numero=".urlencode($_POST['numero'])."&complemento=".urlencode($_POST['complemento'])."&bairro=".urlencode($_POST['bairro'])."&cidade=".urlencode($_POST['cidade'])."&estado=".urlencode($_POST['estado'])."&cep=".urlencode($_POST['cep'])."&padrao=".$_POST['padrao']."&TIPO_CONSTRUCAO=".$_POST['TIPO_CONSTRUCAO']."');</script>";
?>
