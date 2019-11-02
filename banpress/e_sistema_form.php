<?php session_start(); include 'head.php'; ?>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Manutenção de Roteiros</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
					<li>&nbsp;</li>
					<li>&nbsp;</li>
				</ul>
			</div>
			<div id="formulario">
				<form method="get" action="e_sistema.php">
				<input type="hidden" name="sistema1" value="0">
				<input type="hidden" name="momento" value="0">
				          <table>
					<fieldset>
						<tr>
                                                                 <td><label>Produtos:</label></td><td><select id="sel" name="sistema2"><?php foreach (Misc::getSistemasList() as $option) {echo $option;} ?></select></td>
                                                            </tr>
                                                            <tr>
		                                             <td><label>Momento:</label></td><td><select name="momento2"><?php foreach (Misc::getMomentosList() as $option) {echo $option;} ?></select></td>
		                                        </tr>
                                                  </table>
                                                  <div align="center" style="margin-top:60px;">
                                                  <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
                                                  </div>
				</form>
			</div>
		</div>
		<!-- fim do conteudo -->
  <div id="logo" class="grid_12 alpha omega">
   		</div>
	</div>
                                                  </fieldset>
</body>
</html>
