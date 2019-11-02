<?php session_start(); include 'head.php'; ?>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Incluir Elemento</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
					<li><a href="inc_elemento_form.php"><img src="../imagens/icones/elementos.png"/></a></li>
                                                  <li><a href="inc_evento.php?height=500&width=590&modal=true" class="thickbox"><img src="../imagens/icones/eventos.png"/></a></li>
                                                  <li><a href="inc_momento.php"><img src="../imagens/icones/momento.png"/></a></li>
				</ul>
			</div>
			<div id="formulario">
				<form method="post" action="inc_elemento.php">
					<fieldset>
						<div class="campos">
                                                            <label>Seleção:</label>
							<select name="tipo">
								<option value="acao">Ação</option>
								<option value="objeto">Objeto</option>
								<option value="alvo">Alvo</option>
								<option value="origem_destino">Origem/Destino</option>
							</select>
   						</div>
						<div class="campos">
						<label>Codigo:</label>
                                                            <input name="codigo" type="text" class="campo" size="5" maxlength="5" >
						</div>
						<div class="campos">
						<label>Nome:</label>
                                                            <input name="nome" type="text" class="campo" size="50" maxlength="50" >
						<label></div></label>
						<div class="campos">
						<label>Abreviatura:</label>
						<input name="rotulo" type="text" class="campo" size="10" maxlength="10" >
						</div>
                                                  </fieldset>
                                                  <div align="center" style="margin-top:60px;">
                                                  <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
                                                  </div>
				</form>
			</div>
                              <?php
		          if ($_GET['return'] == 1)
		          {
			   echo 'Inserido com sucesso.';
                              }
		          else
		          {
		             if ($_GET['return'])
			   {
			       echo $_GET['return'];
			   }
                              }
	                    ?>

		</div>
		<!-- fim do conteudo -->
  <div id="logo" class="grid_12 alpha omega">
   		</div>
	</div>
</body>
</html>
