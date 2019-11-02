<?php session_start(); include 'head_parti.php'; ?>
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
openBox('alt_participante.php?height=500&width=700&modal=true&id=' + get_radio_value());
}

}
</script>
<?php
if ($_GET['return'])
{
      echo "<Script>openBox('exc_participante_return.php?height=200&width=300&modal=true&return=".urlencode($_GET['return'])."');</script>";
}
?>
