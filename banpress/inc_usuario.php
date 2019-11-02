<?php
session_start();
require_once("../classe/class.php");
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editara">
<script>
jQuery(function($){
   $("#cpf_id").mask("999.999.999-99");
});
</script>
<script>
</script>
<a href="#" onclick="tb_remove();"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Conteudo restrito</span>
Conteudo restrito.
</div>
</body>
</html>
<?php
}
else
{
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>
<body>
<div id="box-editara">
<script>
jQuery(function($){
   $("#cpf_id").mask("999.999.999-99");
});
function getValueByIndex(index, selid)
{
val = document.getElementById(selid).options[index].value;
return val;
}
function getUrl()
{
var nome = document.getElementById("nome_id").value;
var cpf = document.getElementById("cpf_id").value;
var endereco = document.getElementById("endereco_id").value;
var bairro = document.getElementById("bairro_id").value;
var cidade = document.getElementById("cidade_id").value;
var estado = getValueByIndex(document.getElementById("estado_id").selectedIndex, "estado_id");
var email = document.getElementById("email_id").value;
var cargo = document.getElementById("cargo_id").value;
var id = document.getElementById("id_id").value;
var pass = document.getElementById("pass_id").value;
var confirmar_pass = document.getElementById("confirmar_pass_id").value;
var url = "inc_usuario_flags.php?height=500&width=700&modal=true&nome=" + escape(nome) + "&cpf=" + escape(cpf) + "&endereco=" + escape(endereco) + "&bairro=" + escape(bairro) + "&cidade=" + escape(cidade) + "&estado=" + escape(estado) + "&email=" + escape(email) + "&cargo=" + escape(cargo) + "&id=" + escape(id) + "&pass=" + escape(pass) + "&confirmar_pass=" + escape(confirmar_pass);
return url;
}
function openBox()
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, getUrl(), false);
}
</script>
<a href="#" onclick="tb_remove();"><img id="voltar" src="../imagens/bt-voltar-over.png"></a>
<span class="titulo-box-editar">Incluir Usu&aacute;rio</span>
				<form method="get" action="inc_usuario_grava.php">
					<fieldset>
					<table>

      						<tr>
      						<td style="padding-right: 32px;">
						<label>Nome:</label>
						</td>
						<td style="padding-right: 8px;">
                                                            <input type="text" id="nome_id" name="nome" size="50" maxlength="50">
                                                            </td>
                                                            <td style="padding-right: 5px;">
						<label>CPF:</label>
						</td>
						<td>
                                                            <input id="cpf_id" type="text" name="cpf">
                                                            </td>
                                                            </tr>
                                                  </table>
                                                  <table>


						<tr>
						<td style="padding-right:8px;">
						<label>Endere&ccedil;o:</label>
						</td>
						<td>
                                                            <input type="text" id="endereco_id" name="endereco" size="84" maxlength="100">
                                                            </td>
                                                            </tr>
                                                  </table>
                                                  <table>

						<tr>
						<Td style="padding-right: 28px;">
      					          Bairro:
      					          </td>
      					          <td style="padding-right: 8px;">
                                                            <input type="text" id="bairro_id" name="bairro" size="20" maxlength="30">
                                                            </td>
                                                            <Td style="padding-right: 8px;">
						Cidade:
						</td>
						<td>
                                                           <input id="cidade_id" type="text" name="cidade">
                                                            </td>
                                                            </tr>
                                                  </table>
                                                  <table>
                                                            <tr>
                                                            <td style="padding-right: 22px;">
						<label>Estado:</label>
						</td>
						<td>
                                                            <select id="estado_id" name="estado">
                                                                    <option value="0">Selecione o Estado</option>
                                                                    <option value="ac">Acre</option>
                                                                    <option value="al">Alagoas</option>
                                                                    <option value="ap">Amap&aacute;</option>
                                                                    <option value="am">Amazonas</option>
                                                                    <option value="ba">Bahia</option>
                                                                    <option value="ce">Cear&aacute;</option>
                                                                    <option value="df">Distrito Federal</option>
                                                                    <option value="es">Espirito Santo</option>
                                                                    <option value="go">Goi&aacute;s</option>
                                                                    <option value="ma">Maranh&atilde;o</option>
                                                                    <option value="ms">Mato Grosso do Sul</option>
                                                                    <option value="mt">Mato Grosso</option>
                                                                    <option value="mg">Minas Gerais</option>
                                                                    <option value="pa">Par&aacute;</option>
                                                                    <option value="pb">Para&iacute;ba</option>
                                                                    <option value="pr">Paran&aacute;</option>
                                                                    <option value="pe">Pernambuco</option>
                                                                    <option value="pi">Piau&iacute;</option>
                                                                    <option value="rj">Rio de Janeiro</option>
                                                                    <option value="rn">Rio Grande do Norte</option>
                                                                    <option value="rs">Rio Grande do Sul</option>
                                                                    <option value="ro">Rond&ocirc;nia</option>
                                                                    <option value="rr">Roraima</option>
                                                                    <option value="sc">Santa Catarina</option>
                                                                    <option value="sp">S&atilde;o Paulo</option>
                                                                    <option value="se">Sergipe</option>
                                                                    <option value="to">Tocantins</option>
                                                            </select>
                                                            </td>
                                                            </tr>
                                                  </table>
                                                  <table>

						<tr>
						<td style="padding-right: 30px;">
						<label>Email:</label>
						</td>
						<td style="padding-right: 10px;">
                                                            <input id="email_id" type="text" name="email">
                                                            </td>
						<td style="padding-right:13px;">
						<label>Cargo:</label>
						</td>
						<td>
                                                            <input id="cargo_id" type="text" name="cargo">
                                                            </td>
                                                            </tr>
                                                  </table>
                                                  <table>
						<Tr>
						<td style="padding-right:50px;">
						<label>ID:</label>
						</td>
						<Td>
                                                            <input id="id_id" type="text" name="id">
                                                            </td>
                                                            <td>
						Senha:
						</td>
						<Td>
						<input id="pass_id" type="text" name="pass">
						</td>
						</tr>
						<tr>
						<td>
						</td>
						<td>
						</td>
						<td>
						<label>Confirmar:</label>
						</td>
						<Td>
						<input id="confirmar_pass_id" type="text" name="confirmar_pass">
						</td>
						</tr>

					</table>
          				<table>
					<th>Permiss&otilde;es</th>
					<td style="border: 1px solid black;">Fer. Sint&aacute;tica</td><td style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">Eventos</td><td style="border: 1px solid black; padding-left: 12px; padding-right: 12px;">Elementos</td><td style="border: 1px solid black; padding-right: 13px; padding-left: 13px;">Momentos</td><td style="border: 1px solid black; padding-left: 17px; padding-right: 17px;">Roteiros</td><td style="border: 1px solid black; padding-left: 20px; padding-right: 20px;">Usu&aacute;rio</td><td style="border: 1px solid black;">Copiar Roteiro</td>
     					</tr>
					<tr>
					<td style="border: 1px solid black;">Consultar</td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="consultar[]" value="con_fer_sintatica"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="consultar[]" value="con_evento"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
					</tr>
					<tr>
					<td style="border: 1px solid black;">Incluir</td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="incluir[]" value="inc_evento"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="incluir[]" value="inc_elemento"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="incluir[]" value="inc_momento"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="incluir[]" value="inc_roteiro"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="incluir[]" value="inc_usuario"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
					</tr>
					<tr>
					<td style="border: 1px solid black;">Manuten&ccedil;&atilde;o</td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="manutencao[]" value="man_roteiro"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="manutencao[]" value="co_sistema"></td>
					</tr>
                                                  <tr>
					<td style="border: 1px solid black;">Excluir</td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="excluir[]" value="exc_evento"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="excluir[]" value="exc_elemento"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="excluir[]" value="exc_momento"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
                                                  <td style="border: 1px solid black; text-align: center;"><input type="checkbox" name="excluir[]" value="exc_usuario"></td>
                                                  <td style="border: 1px solid black; background: gray;"></td>
					</tr>
					</table>
                                                  </fieldset>
                                                  <div style="position: absolute; left: 70%; top: 50%;">
                                                  <input type="image" src="../imagens/botao-confirma.png"/>
                                                  </div>
				</form>
                    </div>
		<!-- fim do conteudo -->
</body>
</html>
<?php
}
?>
