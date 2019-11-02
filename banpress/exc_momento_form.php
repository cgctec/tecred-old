<?php session_start(); include 'head.php'; ?>
<script>
function getValueByIndex(index, selid)
{
val = document.getElementById(selid).options[index].value;
return val;
}
function getUrl()
{
var momento = getValueByIndex(document.getElementById("momento_id").selectedIndex, "momento_id");
var url = "exc_momento_ask.php?height=200&width=230&modal=true&momento=" + momento;
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
			<span>Excluir Momento</span>
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
                              <label>Momento:</label>
                              <select id="momento_id" name="momento">
                              <?php
                              foreach (Misc::getMomentosList() as $option) {echo $option;}
                              ?>
			</select>
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
