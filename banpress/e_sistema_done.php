<?php
require_once '../classe/class.php';
session_start();
$usuario = new Usuario($_SESSION['user'], null);
if (!$usuario->securityVerify())
{
	header('Location: index.php');
}
$sistema = $_POST['sistema2'];
$sistema_filtro = $_POST['sistema1'];
$momento_filtro = $_POST['momento_filtro'];
$inc_roteiro = $_POST['incluir_roteiro'];
$exc_roteiro = $_POST['excluir_roteiro'];
$momento = $_POST['momento'];
$momento2 = $_POST['momento_'.$exc_roteiro.''];
$sql = new Sql();
$con = $sql->connect();
switch (Misc::get_post_action('incluir', 'excluir'))
{
	case 'incluir':
		if ($inc_roteiro && $sistema && $momento)
		{
			$result = @mysql_result(mysql_query('SELECT cod_sistema FROM roteiro_sistema_momento WHERE cod_sistema = '.$sistema.' AND cod_roteiro = '.$inc_roteiro.' AND cod_momento = '.$momento.';',$con),0);
			if (!$result)
			{
				mysql_query('INSERT INTO roteiro_sistema_momento (cod_roteiro, cod_sistema, cod_momento, matricula, c_time) VALUES ('.$inc_roteiro.','.$sistema.','.$momento.', '.$_SESSION['user'].', '.time().')',$con);
				$return = 'return='.urlencode('Inclusão concluida.');
			}
			else
			{
				$return = 'return='.urlencode('Esse associação já esta presente no sistema.');
			}
		}
		else
		{
			$return = 'return='.urlencode('É necessário selecionar um evento.');
		}
		break;
	case 'excluir':
		if ($exc_roteiro && $sistema)
		{
			$query = 'DELETE FROM roteiro_sistema_momento WHERE cod_roteiro = '.$exc_roteiro.' AND cod_sistema = '.$sistema.' AND cod_momento = '.$momento2.';';
			mysql_query('DELETE FROM roteiro_sistema_momento WHERE cod_roteiro = '.$exc_roteiro.' AND cod_sistema = '.$sistema.' AND cod_momento = '.$momento2.';',$con);
			$return = 'return='.urlencode('Exclusão concluida.');
		}
		else
		{
			$return = 'return='.urlencode('É necessário selecionar um evento.');
		}
		break;
}
$sql->close();
header ('Location: e_sistema.php?sistema2='.$sistema.'&'.$return.'&sistema1='.$sistema_filtro.'&momento='.$momento_filtro.'&momento2='.$_POST['momento2'].'');
?>
