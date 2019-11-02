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
if (document.imoveis.COD_IMOVEL.length)
{
for (var i=0; i < document.imoveis.COD_IMOVEL.length; i++)
{
   if (document.imoveis.COD_IMOVEL[i].checked)
      {
      var rad_val = document.imoveis.COD_IMOVEL[i].value;
      return rad_val;
      }
}
}
else
{
      if (document.getElementById("ID_COD_IMOVEL").checked)
      {
         return document.getElementById("ID_COD_IMOVEL").value;
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
openBox('alt_imovel.php?height=500&width=700&modal=true&id=' + get_radio_value());
}
}
</script>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Imóveis</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                            <form name="imoveis" action="exc_imovel.php">
                            <div id="menu-superior">
				<ul>
                                                  <li><a href="inc_imovel.php?height=500&width=700&modal=true" class="thickbox"><img width="50" heigth="50" src="../imagens/adicionar.png"/></a></li>
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
                                <td class="top" >Estado</td>
                                <td class="top">Classificação</td>
                                <td class="top">Tipo de Imóvel</td>
                            </tr>
                            <?php
                                 foreach(Misc::getImoveisList() as $COD_IMOVEL)
                                 {
                                       $imovel = new Imoveis($COD_IMOVEL);
                                       echo '
                                       <tr>
                                           <td><input type="radio" id="ID_COD_IMOVEL" name="COD_IMOVEL" value="'.$COD_IMOVEL.'"></td>
                                           <td>'.$COD_IMOVEL.'</td>
                                           <td style="text-align:left;">'.$imovel->estado.'</td>
                                           <td>'.$imovel->padrao.'</td>
                                           <td>'.$imovel->tipo.'</td>
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
