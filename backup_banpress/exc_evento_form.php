<?php session_start(); include 'head.php'; ?>
<script>
function getUrl()
{
var acao = document.getElementById("acao_id").value;
var objeto = document.getElementById("objeto_id").value;
var alvo = document.getElementById("alvo_id").value;
var origem = document.getElementById("origem_id").value;
var destino = document.getElementById("destino_id").value;
var url = "exc_evento_ask.php?height=200&width=230&modal=true&acao=" + acao + "&objeto=" + objeto + "&alvo=" + alvo + "&origem=" + origem + "&destino=" + destino;
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
			<span>Excluir Evento</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
                                                  <li><a href="exc_elemento_form.php"><img src="../imagens/icones/exc_elemento.png"/></a></li>
					<li><a href="exc_evento_form.php"><img src="../imagens/icones/exc_evento.png"/></a></li>
                                                  <li><a href="exc_momento_form.php"><img src="../imagens/icones/exc_momento.png"/></a></li>
     					<li><a href="exc_usuario_form.php"><img src="../imagens/icones/exc_usuario.png"/></a></li>
				</ul>
			</div>
                              <div id="formulario">
                              <form method="post" action="">
                              <fieldset>
                              <div class="campos">
                              <label>Ação:</label>
                              <input id="acao_id" name="acao" type="text" class="campo" size="5" maxlength="3" >
                              </div>
                              <div class="campos">
                              <label>Objeto:</label>
                              <input id="objeto_id" name="objeto" type="text" class="campo" size="5" maxlength="5" >
                              </div>
                              <div class="campos">
                              <label>Alvo:</label>
                              <input id="alvo_id" name="alvo" type="text" class="campo" size="5" maxlength="5" >
                              </div>
                              <div class="campos">
                              <label>Origem:</label>
                              <input id="origem_id" name="origem" type="text" class="campo" size="5" maxlength="5" >
                              </div>
                              <div class="campos">
                              <label>Destino:</label>
                              <input id="destino_id" name="destino" type="text" class="campo" size="5" maxlength="5" >
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
