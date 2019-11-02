<?php session_start(); include 'head.php'; ?>
<script>
function getValueByIndex(index, selid)
{
val = document.getElementById(selid).options[index].value;
return val;
}
function getUrl()
{
var tipo = getValueByIndex(document.getElementById("tipo_id").selectedIndex, "tipo_id");
var codigo = document.getElementById("codigo_id").value;
var url = "exc_elemento_ask.php?height=200&width=230&modal=true&tipo=" + escape(tipo) + "&codigo=" + codigo;
return url;
}
function openBox()
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, getUrl(), false);
}
</script>
<body>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Excluir Elemento</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
                                                  <li><a href="exc_elemento_form.php"><img src="../imagens/icones/exc_elemento.png"/></a></li>
					<li><a href="exc_evento_form.php"><img src="../imagens/icones/exc_evento.png"/></a></li>
                                                  <li><a href="exc_momento_form.php"><img src="../imagens/icones/exc_momento.png"/></a></li>
				</ul>
			</div>
                              <div id="formulario">
                              <form method="post" action="">
                              <fieldset>
                              <div class="campos">
                              <label>Seleção:</label>
                              <select id="tipo_id" name="tipo">
				<option value="acao">Ação</option>
				<option value="objeto">Objeto</option>
				<option value="alvo">Alvo</option>
				<option value="origem_destino">Origem/Destino</option>
			</select>
                              </div>
                              <div class="campos">
                              <label>Codigo:</label>
                              <input id="codigo_id" name="codigo" type="text" class="campo" size="5" maxlength="5" >
                              </div>
                              </fieldset>
                              <div align="center" style="margin-top:60px;">
                              <img width="50" height="50" src="../imagens/delete.png" onclick="openBox();">
                              </div>
                              </form>
                              </div>
                              <?php
                              if ($_GET['return'])
                              {
                              echo $_GET['return'];
                              }
                              ?>
		</div>
		<!-- fim do conteudo -->
		<div id="logo" class="grid_12 alpha omega">
   		</div>
	</div>
</body>
</html>
