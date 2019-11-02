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
if (document.participantes.COD_PARTICIPANTE.length)
{
for (var i=0; i < document.participantes.COD_PARTICIPANTE.length; i++)
{
   if (document.participantes.COD_PARTICIPANTE[i].checked)
      {
      var rad_val = document.participantes.COD_PARTICIPANTE[i].value;
      return rad_val;
      }
}
}
else
{
      if (document.getElementById("ID_COD_PARTICIPANTE").checked)
      {
         return document.getElementById("ID_COD_PARTICIPANTE").value;
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
//alert (get_radio_value());
if (get_radio_value())
{
openBox('alt_seguradora.php?height=500&width=700&modal=true&id=' + get_radio_value());
}

}
function Cotacao()
{
//alert (get_radio_value());
if (get_radio_value())
{
openBox('cotacao_seguradora.php?height=500&width=700&modal=true&id=' + get_radio_value());
}

}
</script>
		<div id="titulo" class="grid_9" style="float: right; margin-right: 90px;">
			<span>Seguradoras</span>
		</div>
		<div id="conteudo" class="grid_9 scroll omega">
                            <form name="participantes" action="exc_seguradora.php">
                            <div id="menu-superior">
				<ul>
                                                  <li><a href="inc_seguradora.php?height=500&width=700&modal=true" class="thickbox"><img width="50" heigth="50" src="../imagens/adicionar.png"/></a></li>
					<li><a onclick="Alterar();"href="#"><img width="50" heigth="50" src="../imagens/alterar.png"/></a></li>
					<li><a href="#" style="position:relative; top:20px;"><input type="image" width="50" heigth="50" src="../imagens/delete.png"/></a></li>
					<li><a onclick="Cotacao();"href="#"><img width="50" heigth="50" src="../imagens/menu-cotacao.png"/></a></li>
				</ul>

                            </div>
                            <style>
                            .top
                            {
                                 background:#000000;
                                 border: 1px solid green;
                            }
                            </style>
                            <center>
                            <table>
                            <tr>
                                <Td class="top">-</td>
                                <td class="top">Codigo</td>
                                <td class="top" style="width:400px;">Nome</td>
                            </tr>
                            <?php
                                 foreach(Misc::getSeguradorasList() as $COD_SEGURADORA)
                                 {
                                       $seguradora = new Seguradoras($COD_SEGURADORA);
                                       echo '
                                       <tr>
                                           <td><input type="radio" id="ID_COD_PARTICIPANTE" name="COD_PARTICIPANTE" value="'.$COD_SEGURADORA.'"></td>
                                           <td>'.$seguradora->COD_SEGURADORA.'</td>
                                           <td style="text-align:left;">'.$seguradora->NOME.'</td>
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
<?php
if ($_GET['return'])
{
      echo "<Script>openBox('exc_participante_return.php?height=200&width=300&modal=true&return=".urlencode($_GET['return'])."');</script>";
}
?>
