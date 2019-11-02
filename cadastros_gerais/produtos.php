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
if (document.produtos.NU_PRODUTO.length)
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
else
{
      if (document.getElementById("ID_NU_PRODUTO").checked)
      {
         return document.getElementById("ID_NU_PRODUTO").value;
      }
      else
      {
         return 0;
      }
}
//alert (document.participantes.COD_PARTICIPANTE.length);
}
function Alterar()
{
if (get_radio_value() > 0)
{
openBox('alt_produto.php?height=300&width=500&modal=true&NU_PRODUTO=' + get_radio_value());
}
}
</script>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Produtos</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                            <form name="produtos" action="exc_produto.php">
                            <div id="menu-superior">
				<ul>
                                                  <li><a href="inc_produto.php?height=300&width=300&modal=true" class="thickbox"><img width="50" heigth="50" src="../imagens/adicionar.png"/></a></li>
					<li><a onclick="Alterar();"href="#"><img width="50" heigth="50" src="../imagens/alterar.png"/></a></li>
					<li><a href="#" style="position:relative; top:20px;"><input type="image" width="50" heigth="50" src="../imagens/delete.png"/></a></li>
				</ul>

                            </div>
                            <style>
                            .top
                            {
                                 background:#000000;
                                 border: 1px solid green;
                            }
                            </style>
                            <table width="100%">
                            <tr>
                                <Td class="top">-</td>
                                <td class="top">Codigo</td>
                                <td class="top" >Nome</td>
                                <td class="top">Inicio</td>
                                <td class="top">Término</td>
                                <td class="top">Excluido</td>
                            </tr>
                            <?php
                                 foreach(Misc::getTabelaProdutosList() as $NU_PRODUTO)
                                 {
                                       $produto = new ProdutoS($NU_PRODUTO);
                                       echo '
                                       <tr>
                                           <td><input type="radio" id="ID_NU_PRODUTO" name="NU_PRODUTO" value="'.$NU_PRODUTO.'"></td>
                                           <td>'.$produto->NU_PRODUTO.'</td>
                                           <td style="text-align:left;">'.$produto->NO_PRODUTO.'</td>
                                           <td>'.$produto->DT_INICIO.'</td>
                                           <td>'.$produto->DT_FIM.'</td>
                                           <td>'.$produto->IC_CANCELADO.'</td>
                                       </tr>
                                       ';
                                 }
                            ?>
                            </table>
                            </form>
   		</div>
		<!-- fim do conteudo -->
 	          <div id="logo" class="grid_12 alpha omega">
  		</div>
	</div>
</body>
</html>
