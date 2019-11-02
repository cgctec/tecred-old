<?php session_start(); include 'head.php'; ?>
<body onload="changeUrl();">
 		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Consultar Eventos</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
					<li><a href="consulta_fatos.php?height=500&width=900&modal=true" class="thickbox"><img src="../imagens/icones/ferramenta_sintatica.png"/></a></li>
					<li><a href="consulta_evento_filtro.php"><img src="../imagens/icones/eventos.png"/></a></li>
				</ul>

			</div>
			<div id="formulario">
                              <form method="get" action="consulta_evento.php">
                              <input type="hidden" name="sistema" value="0">
                              <table>
                              <tr>
		          <td><label>Momento: </label></td><td><select name="momento" id="id_momento" onchange="changeUrl();"><option value="0">Todos</option><?php foreach (Misc::getMomentosList() as $option) {echo $option;} ?></select></td>
		          </tr>
		          <tr>
		          <td><label>Situação: </label></td><td><select name="situacao" id="id_situacao" onchange="changeUrl();"><option value="todos">Todos</option><option value="ncancelados">Não cancelados</option><option value="cancelados">Cancelados</option></select></td></tr>
		          <td><label>Vigencia: </label></td><Td><select name="vigencia" id="id_vigencia" onchange="changeUrl();"><option value="todos">Todos</option><option value="vigentes">Vigentes</option><option value="nvigentes">Não vigentes</option></select></td>
		          </tr>
		          </table>
                              <div align="center">
                              <input type="image" src="../imagens/botao-confirma.png">
                              </div>
                              </form>
                              </div>
		</div>
		<!-- fim do conteudo -->
		<div id="logo" class="grid_12 alpha omega">
   		</div>
	</div>
</body>
