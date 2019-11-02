<?php
function getFraseByCod($cod, $tipo)
{
$sql = new Sql();
$con = $sql->connect();
$frase = mysql_result(mysql_query("SELECT nome FROM modelo_sintatico WHERE codigo = $cod AND tipo = $tipo;",$con),0);
$sql->close();
return $frase;
}
$file = fopen("acoes.csv", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
require_once("classe/class.php");

while(!feof($file))
  {
		$line = fgets($file);
                    $tmp = explode(";", $line);
                    if ($tmp[2] != 10) //alvo diferente 10
                    {
                    }
                    echo "INSERT INTO roteiro (acao_cod, objeto_cod, alvo_cod, origem_cod, destino_cod, frase, rotulo) VALUES (4, ".$tmp[0].", '".$tmp[1]."', NULL, 0, 0)<BR>";

  }
fclose($file);
?>
