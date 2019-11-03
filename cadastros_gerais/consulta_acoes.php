<?php session_start(); include 'head_acoes.php'; ?>
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
