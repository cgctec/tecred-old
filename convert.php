<?php
//configurações
$config['nome_tabela'] = "`tabela_produtos`";
//final configurações
$file = fopen("acoes.csv", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
require_once("classe/class.php");
$sql = new Sql();
$con = $sql->connect();
while(!feof($file))
  {
		$line = fgets($file);
                    $tmp = explode(";", $line);
                    mysql_query("INSERT INTO modelo_sintatico (tipo, codigo, nome, rotulo, matricula, c_time) VALUES (4, ".$tmp[0].", '".$tmp[1]."', NULL, 0, 0)",$con);
                    echo "INSERT INTO modelo_sintatico (tipo, codigo, nome, rotulo, matricula, c_time) VALUES (4, ".$tmp[0].", '".$tmp[1]."', NULL, 0, 0)<BR>";

  }
fclose($file);
?>
