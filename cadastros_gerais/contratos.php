<?php session_start(); include 'head_contr.php'; ?>
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

