<?php session_start(); include 'head.php'; ?>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Manutenção de Roteiros</span>
		</div>

		<div id="conteudo" class="grid_9 scroll omega">
			<div id="menu-superior">
				<ul>
					<li><a href="c_sistema.php"><img src="../imagens/icones/co_sistema.png"/></a></li>
					<li><a href="e_sistema_form.php"><img src="../imagens/icones/roteiro.png"/></a></li>
				</ul>
			</div>
			<div id="formulario">
				<form method="get" action="e_sistema.php">
				          <table>
					<fieldset>

						<Tr>
                                                                 <td><label>Roteiro:</label></td><td><select name="sistema1"><option value="0">Todos</option><?php foreach (Misc::getSistemasList() as $option) {echo $option;} ?></select></td>
                                                            </tr>
                                                            <tr style="padding-bottom: 10px; border-bottom: 1px solid white;">
		                                             <td><label>Momento:</label></td><td><select name="momento"><option value="0">Todos</option><?php foreach (Misc::getMomentosList() as $option) {echo $option;} ?></select></td>
                                                            </tr>
						<tr>
                                                                 <td><label>Roteiro:</label></td><td><select id="sel" name="sistema2"><option value="0">Selecione um roteiro</option><?php foreach (Misc::getSistemasList() as $option) {echo $option;} ?></select></td>
                                                            </tr>
                                                            <tr>
		                                             <td><label>Momento:</label></td><td><select name="momento2"><option value="0">Todos</option><?php foreach (Misc::getMomentosList() as $option) {echo $option;} ?></select></td>
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
