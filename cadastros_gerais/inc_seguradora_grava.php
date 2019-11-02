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
$participante = new Seguradoras(null);
$participante->NOME = $_POST['NOME'];
$participante->origem_destino = $_POST['origem_destino'];
$participante->endereco = $_POST['endereco'];
$participante->numero = $_POST['numero'];
$participante->complemento = $_POST['complemento'];
$participante->bairro = $_POST['bairro'];
$participante->cidade = $_POST['cidade'];
$participante->estado = $_POST['estado'];
$participante->telefone = $_POST['telefone'];
$participante->cep = $_POST['cep'];
$participante->cpf_cnpj = $_POST['cpf_cnpj'];
$participante->email = $_POST['email'];
if ($participante->salvar())
{
   echo '<script>openBox("seguradora_ok.php?height=100&width=80&modal=true");</script>';
}
else
   echo "<script>openBox('seguradora_return.php?height=200&width=380&modal=true&destino=".urlencode("inc_seguradora.php")."&return=".urlencode($participante->errorstr)."&NOME=".urlencode($_POST['NOME'])."&origem_destino=".urlencode($_POST['origem_destino'])."&endereco=".urlencode($_POST['endereco'])."&numero=".urlencode($_POST['numero'])."&complemento=".urlencode($_POST['complemento'])."&bairro=".urlencode($_POST['bairro'])."&cidade=".urlencode($_POST['cidade'])."&estado=".urlencode($_POST['estado'])."&telefone=".urlencode($_POST['telefone'])."&cep=".urlencode($_POST['cep'])."&cpf_cnpj=".urlencode($_POST['cpf_cnpj'])."&email=".urlencode($_POST['email'])."');</script>";
?>
