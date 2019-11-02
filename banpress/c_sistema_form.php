<?php session_start(); include 'head.php'; ?>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Copiar Sistema</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
					<li><a href="c_sistema.php"><img src="../imagens/icones/co_sistema.png"/></a></li>
					<li><a href="e_sistema_form.php"><img src="../imagens/icones/roteiro.png"/></a></li>
				</ul>
			</div>
			<div id="formulario">
				<form method="post" action="c_sistema.php">
				          <table>
					<fieldset>
						<div class="campos">
                                                                 <tr><td><label>Copiar de:</label></td><td><select name="sistema1"><option value="0">Selecione um roteiro</option><?php foreach (Misc::getSistemasList() as $option) {echo $option;} ?></select></td></tr>
   						</div>
						<div class="campos">
                                                                 <Tr><td><label>Para:</label></td><td><select name="sistema2"><option value="0">Selecione um roteiro</option><?php foreach (Misc::getEmptySistemasList() as $option) {echo $option;} ?></select></td></tr>
						</div>
                                                  </fieldset>
                                                  </table>
                                                  <div align="center" style="margin-top:60px;">
                                                  <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
                                                  </div>
				</form>
			</div>
                              <?php
		          if ($_GET['return'] == 1)
		          {
			   echo 'Sistema copiado com sucesso.';
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
