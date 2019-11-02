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
$participante = new Participantes($_POST['id']);
$participante->NOME_PARTICIPANTE = $_POST['NOME_PARTICIPANTE'];
$participante->endereco = $_POST['endereco'];
$participante->numero = $_POST['numero'];
$participante->complemento = $_POST['complemento'];
$participante->bairro = $_POST['bairro'];
$participante->cidade = $_POST['cidade'];
$participante->estado = $_POST['estado'];
$participante->telefone = $_POST['telefone'];
$participante->cep = $_POST['cep'];
$participante->email = $_POST['email'];
$participante->renda = str_replace("%", "", $_POST['renda']);
if ($participante->salvar())
{
   echo '<script>openBox("participante_ok.php?height=100&width=80&modal=true");</script>';
}
else
   echo "<script>openBox('participante_return.php?height=200&width=380&modal=true&destino=".urlencode("alt_seguradora.php")."&return=".urlencode($participante->errorstr)."&id=".urlencode($_POST['id'])."&NOME_PARTICIPANTE=".urlencode($_POST['NOME_PARTICIPANTE'])."&endereco=".urlencode($_POST['endereco'])."&numero=".urlencode($_POST['numero'])."&complemento=".urlencode($_POST['complemento'])."&bairro=".urlencode($_POST['bairro'])."&cidade=".urlencode($_POST['cidade'])."&estado=".urlencode($_POST['estado'])."&telefone=".urlencode($_POST['telefone'])."&cep=".urlencode($_POST['cep'])."&email=".urlencode($_POST['email'])."&renda=".urlencode($_POST['renda'])."');</script>";
?>
