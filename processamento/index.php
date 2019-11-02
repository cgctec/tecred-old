<?php session_start(); include 'head.php'; ?>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Controle do Processamento</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                            <form name="produtos" action="#">
                            <div id="menu-superior">
				<ul>
                                            <li>&nbsp;</li>
				</ul>

                            </div>
                            <style>
                            .top
                            {
                                 background:#000000;
                                 border: 1px solid green;
                            }
                            </style>
                            <Center>
                            <table width="70%">
                            <tr>
                                <td class="top">-</td>
                                <td class="top">Codigo</td>
                                <td class="top">Nome</td>
                                <td class="top">Ultimo Processamento</td>
                            </tr>
                            <?php
                                 foreach(Misc::getProcessamentoList() as $codigo)
                                 {
                                       $processamento = new Processamento($codigo);
                                       echo '
                                       <tr>
                                           <td><input name="processos[]" type="checkbox" value="'.$processamento->codigo.'"></td>
                                           <td>'.$processamento->codigo.'</td>
                                           <td style="text-align:left;">'.$processamento->nome.'</td>
                                           <td style="text-align:left;">'.@date('d/m/Y',$processamento->data).'</td>
                                       </tr>
                                       ';
                                 }
                            ?>
                            </table>
                            </center>
                            <div align="center">
                                  <input type="image" src="../imagens/botao-confirma.png" value="OK"/>
                            </div>
                            </form>
   		</div>
		<!-- fim do conteudo -->
 	          <div id="logo" class="grid_12 alpha omega">
  		</div>
	</div>
</body>
</html>
