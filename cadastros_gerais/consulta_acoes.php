<?php session_start(); include 'head.php'; ?>
<script>
function openBox(url)
{
imgLoader = new Image();// preload image
imgLoader.src = tb_pathToImage;
tb_show(null, url, false);
}
function get_radio_value()
{
for (var i=0; i < document.produtos.NU_PRODUTO.length; i++)
   {
   if (document.produtos.NU_PRODUTO[i].checked)
      {
      var rad_val = document.produtos.NU_PRODUTO[i].value;
      return rad_val;
      }
   }
}
function Alterar()
{
openBox('alt_produto.php?height=300&width=500&modal=true&NU_PRODUTO=' + get_radio_value());
}
</script>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Consulta ações de bloqueio</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                            <form name="produtos" action="exc_produto.php">
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
                                <td class="top">Codigo</td>
                                <td class="top">Nome</td>
                            </tr>
                            <?php
                                 foreach(Misc::getAcoesList() as $codigo)
                                 {
                                       $acao = new Acoes($codigo);
                                       echo '
                                       <tr>
                                           <td>'.$acao->codigo.'</td>
                                           <td style="text-align:left;">'.$acao->nome.'</td>
                                       </tr>
                                       ';
                                 }
                            ?>
                            </table>
                            </center>
                            </form>
   		</div>
		<!-- fim do conteudo -->
 	          <div id="logo" class="grid_12 alpha omega">
  		</div>
	</div>
</body>
</html>
