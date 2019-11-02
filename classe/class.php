<?php
class Validate
{
	function Codigo($codigo)
	{
		return eregi('^[0-9]{1,5}$', $codigo);
	}
	function string($nome, $len)
	{
		if (strlen($nome) >= 1 && strlen($nome) <= $len)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function produtoExistente($nome)
	{
	          $sql = new Sql();
	          $con = $sql->connect();
	          $get = @mysqli_result(mysqli_query("SELECT NO_PRODUTO FROM tabela_produtos WHERE NO_PRODUTO = '$nome';",$con),0);
	          $sql->close();
	          if ($get)
	          {
                       return true;
                    }
                    else
                    {
                       return false;
                    }
	}
}
class Misc
{
function get_user_browser()
{
$u_agent = $_SERVER [ 'HTTP_USER_AGENT' ];
$ub = '' ;
if( preg_match ( '/MSIE/i' , $u_agent ))
{
$ub = "ie" ;
}
elseif( preg_match ( '/Firefox/i' , $u_agent ))
{
$ub = "firefox" ;
}
elseif( preg_match ( '/Safari/i' , $u_agent ))
{
$ub = "safari" ;
}
elseif( preg_match ( '/Chrome/i' , $u_agent ))
{
$ub = "chrome" ;
}
elseif( preg_match ( '/Flock/i' , $u_agent ))
{
$ub = "flock" ;
}
elseif( preg_match ( '/Opera/i' , $u_agent ))
{
$ub = "opera" ;
}

return $ub ;
}
	function loadEventScreen()
	{
		if ($_GET['cod1'] && $_GET['cod2'] && $_GET['cod3'] && $_GET['cod4'] && $_GET['cod5'])
		{
			echo '
			<script>
				document.getElementById("cod1").value = "'.$_GET['cod1'].'";
				document.getElementById("cod2").value = "'.$_GET['cod2'].'";
				document.getElementById("cod3").value = "'.$_GET['cod3'].'";
				document.getElementById("cod4").value = "'.$_GET['cod4'].'";
				document.getElementById("cod5").value = "'.$_GET['cod5'].'";
				SetIndex("sel1", "cod1");
				SetIndex("sel2", "cod2");
				SetIndex("sel3", "cod3");
				SetIndex("sel4", "cod4");
				SetIndex("sel5", "cod5");
				escreveFrase();
			</script>
			';
		}
	}
	function getFraseStr($frase)
	{
		switch($frase)
		{
			case 1:
			break;
			return 'Frase comum';
			case 2:
			break;
			return 'Frase extorno';
			case 3:
			break;
			return 'Frase agendamento';
			case 4:
			break;
			return 'Frase extorno do agendamento';
		}
	}
	function get_post_action($name)
	{
		$params = func_get_args();
		foreach ($params as $name) 
		{
			if (isset($_POST[$name])) 
			{
				return $name;
			}
		}
	}

	function getUidArray($sistema, $momento, $situacao, $vigencia)
	{
		$sql = new Sql();
		$con = $sql->connect();
		$uids = array();
		switch ($situacao)
		{
			case 'todos':
				$con_situacao = '';
				break;
			case 'ncancelados':
				$con_situacao = 'AND roteiro.ic_cancelado = "N"';
				break;
			case 'cancelados':
				$con_situacao = 'AND roteiro.ic_cancelado = "S"';
				break;
		}
		switch ($vigencia)
		{
			case 'todos':
				$con_vigencia = '';
				break;
			case 'vigentes':
				$con_vigencia = 'AND roteiro.fim_vigencia >= '.time();
				break;
			case 'nvigentes':
				$con_vigencia = 'AND roteiro.fim_vigencia < '.time();
				break;
		}
		if ($sistema && $momento)
		{
			$query = 'SELECT DISTINCT roteiro_sistema_momento.cod_roteiro as cod_roteiro FROM roteiro_sistema_momento INNER JOIN roteiro ON roteiro.uid = roteiro_sistema_momento.cod_roteiro WHERE roteiro_sistema_momento.cod_sistema = '.$sistema.' AND roteiro_sistema_momento.cod_momento = '.$momento.' '.$con_situacao.' '.$con_vigencia.' ORDER BY roteiro_sistema_momento.cod_roteiro ASC;';
			echo $query;
			$result = mysqli_query($con, $query);
			while ($fetch = @mysqli_fetch_array($result))
			{
				$uids[] = $fetch['cod_roteiro'];
			}
		}
		else
		{
			if ($sistema || $momento)
			{
				if ($sistema)
				{
					$query = 'SELECT DISTINCT roteiro_sistema_momento.cod_roteiro as cod_roteiro FROM roteiro_sistema_momento INNER JOIN roteiro ON roteiro.uid = roteiro_sistema_momento.cod_roteiro WHERE roteiro_sistema_momento.cod_sistema = '.$sistema.' '.$con_situacao.' '.$con_vigencia.' ORDER BY roteiro_sistema_momento.cod_roteiro ASC;';
					$result = mysqli_query($con, $query);
					while ($fetch = @mysqli_fetch_array($result))
					{
						$uids[] = $fetch['cod_roteiro'];
					}
				}
				if ($momento)
				{
					$query = 'SELECT DISTINCT roteiro_sistema_momento.cod_roteiro as cod_roteiro FROM roteiro_sistema_momento INNER JOIN roteiro ON roteiro.uid = roteiro_sistema_momento.cod_roteiro WHERE roteiro_sistema_momento.cod_momento = '.$momento.' '.$con_situacao.' '.$con_vigencia.' ORDER BY roteiro_sistema_momento.cod_roteiro ASC;';
					$result = mysqli_query($con, $query);
					while ($fetch = @mysqli_fetch_array($result))
					{
						$uids[] = $fetch['cod_roteiro'];
					}
				}
			}
			else
			{
                                        if ($con_vigencia != '' && $con_situacao != '')
                                        {
                                        $query = 'SELECT * FROM roteiro WHERE '.str_replace('AND', '', $con_situacao).' '.$con_vigencia.';';
                                        }
                                        if ($con_vigencia != '')
                                        {
                                        $query = 'SELECT * FROM roteiro WHERE '.str_replace('AND', '', $con_vigencia).';';
                                        }
                                        if ($con_situacao != '')
                                        {
                                        $query = 'SELECT * FROM roteiro WHERE '.str_replace('AND', '', $con_situacao).';';
                                        }
                                        if ($con_vigencia == '' && $con_situacao == '')
                                        {
                                        $query = 'SELECT * FROM roteiro;';
                                        }
				//echo $query;
				$result = mysqli_query($con, $query);
				while ($fetch = mysqli_fetch_array($result))
				{
					$uids[] = $fetch['uid'];
				}
			}
		}
		$sql->close();
		return $uids;
	}
	function getSistemasList()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT * FROM tabela_produtos ORDER BY NO_PRODUTO ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['NU_PRODUTO'].'">'.$fetch['NO_PRODUTO'].'</option>';
		}
		$sql->close();
		return $options;
	}
	function getEmptySistemasList()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT * FROM sistemas WHERE 1=1 ORDER BY nome ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$query2 = 'SELECT cod_sistema FROM roteiro_sistema_momento WHERE cod_sistema = '.$fetch['codigo'].';';
			$result2 = @mysqli_result(mysqli_query($query2, $con),0);
			if (!$result2)
			{
				$options[] = '<option value="'.$fetch['codigo'].'">'.$fetch['nome'].'</option>';
			}
		}
		$sql->close();
		return $options;
	}
	function getMomentosList()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT * FROM momentos WHERE 1=1 ORDER BY nome ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['codigo'].'">'.$fetch['nome'].'</option>';
		}
		$sql->close();
		return $options;
	}
	function getUsersList()
	{
	          $sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT * FROM users WHERE ban=0 ORDER BY nome ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['matricula'].'">'.$fetch['nome'].'</option>';
		}
		$sql->close();
		return $options;
	}
	function getAccessList()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT DISTINCT id FROM security WHERE 1=1 ORDER BY id ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['id'].'">'.$fetch['id'].'</option>';
		}
		$sql->close();
		return $options;
	}
	function getUsernameByMatricula($matricula)
	{
                    $sql = new Sql();
                    $con = $sql->connect();
                    $nome = @mysqli_result(mysqli_query('SELECT nome FROM usuario WHERE matricula = '.$matricula.';', $con),0);
                    $sql->close();
                    return $nome;
	}
	function getTabelaProdutosList()
	{
	          $produtos = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query($con, "SELECT NU_PRODUTO FROM tabela_produtos WHERE IC_CANCELADO = 'N';");
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $produtos[] = $fetch['NU_PRODUTO'];
                    }
	          $sql->close();
                    return $produtos;
	}
	function getAcoesList()
	{
	          $acoes = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query("SELECT codigo FROM acoes_bloqueio;",$con);
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $acoes[] = $fetch['codigo'];
                    }
	          $sql->close();
                    return $acoes;
	}
	function getProcessamentoList()
	{
	          $acoes = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query("SELECT codigo FROM controle_processamento;",$con);
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $acoes[] = $fetch['codigo'];
                    }
	          $sql->close();
                    return $acoes;
	}
	function getParticipantesList()
	{
	          $acoes = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query($con, "SELECT COD_PARTICIPANTE FROM participantes;");
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $acoes[] = $fetch['COD_PARTICIPANTE'];
                    }
	          $sql->close();
                    return $acoes;
	}
	function getSeguradorasList()
	{
	          $acoes = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query($con, "SELECT COD_SEGURADORA FROM seguradoras;");
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $acoes[] = $fetch['COD_SEGURADORA'];
                    }
	          $sql->close();
                    return $acoes;
	}
	function getImoveisList()
	{
	          $acoes = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query("SELECT COD_IMOVEL FROM imoveis;",$con);
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $acoes[] = $fetch['COD_IMOVEL'];
                    }
	          $sql->close();
                    return $acoes;
	}
	function getContratoList()
	{
	          $acoes = array();
	          $sql = new Sql();
	          $con = $sql->connect();
	          $result = mysqli_query($con, "SELECT NU_CONTRATO FROM contrato;");
                    while ($fetch = mysqli_fetch_array($result))
                    {
                          $acoes[] = $fetch['NU_CONTRATO'];
                    }
	          $sql->close();
                    return $acoes;
	}
	function listaTiposParticipante()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT codigo, nome FROM tipo_participante ORDER BY nome ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['codigo'].'">'.$fetch['nome'].'</option>';
		}
		$sql->close();
		return $options;
	}
	function listaImoveisPadrao()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT COD_PADRAO, NOME_PADRAO FROM imovel_padrao ORDER BY NOME_PADRAO ASC;';
		$result = mysqli_query($query, $con);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['COD_PADRAO'].'">'.$fetch['NOME_PADRAO'].'</option>';
		}
		$sql->close();
		return $options;
	}
	function listaImoveisTipo()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$options = array();
		$query = 'SELECT COD_TIPO_CONSTRUCAO, NOME_TIPO_CONSTRUCAO FROM imovel_tipo_construcao ORDER BY NOME_TIPO_CONSTRUCAO ASC;';
		$result = mysqli_query($con, $query);
		while ($fetch = mysqli_fetch_array($result))
		{
			$options[] = '<option value="'.$fetch['COD_TIPO_CONSTRUCAO'].'">'.$fetch['NOME_TIPO_CONSTRUCAO'].'</option>';
		}
		$sql->close();
		return $options;
	}
}
class Sql
{
	var $con;
	function connect()
	{
		include('config.php');
		$con = mysqli_connect($config['dbhost'], $config['dbuser'], $config['dbpass']) or die(mysqli_connect_error());
		$banco = mysqli_select_db($con,'cgctecco_tecred_old');

		/*		$con = mysqli_connect($config['dbhost'], $config['dbuser'], $config['dbpass'])  or die(mysqli_error());
                mysqli_select_db($config['dbname'], $con);*/
		$this->con = $con;
		return $this->con;
	}
	function close()
	{
		mysqli_close($this->con);
	}
}
class Cadastro
{
          var $nome;
          var $cpf;
          var $endereco;
          var $bairro;
          var $cidade;
          var $estado;
          var $email;
          var $cargo;
          var $id;
	var $senha;
	var $consultar;
	var $incluir;
	var $manutencao;
	var $excluir;
	var $flags = array('/manutencao.php', '/index.php', '/incluir.php', '/excluir.php', '/consultar.php');
	function __construct($nome, $cpf, $endereco, $bairro, $cidade, $estado, $email, $cargo, $id, $senha, $consultar, $incluir, $manutencao, $excluir)
	{
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->endereco = $endereco;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->estado = $estado;
                    $this->email = $email;
                    $this->cargo = $cargo;
                    $this->id = $id;
		$this->senha = $senha;
		$this->consultar = $consultar;
		$this->incluir = $incluir;
		$this->manutencao = $manutencao;
		$this->excluir = $excluir;
	}
	function gerarFlags()
	{
	          $con_fer_sintatica = array ('/consulta_fatos.php');
	          $con_evento = array ('/consulta_evento.php', '/consulta_evento_filtro.php', '/cancelar.php', '/alt_evento.php', '/alt_evento_form.php');
	          $inc_elemento = array ('/inc_elemento_form.php', '/ing_elemento.php');
	          $inc_evento = array ('/inc_evento.php', '/inc_evento_grava.php', '/evento_ok.php', '/evento_return.php');
	          $inc_momento = array ('/inc_momento.php', '/inc_momento_grava.php');
	          $inc_roteiro = array ('/inc_roteiro.php', '/inc_roteiro_grava.php');
	          $inc_usuario = array ('/inc_usuario.php', '/inc_usuario_grava.php');
	          $co_sistema = array ('/c_sistema_form.php', '/c_sistema.php');
	          $man_roteiro = array ('/e_sistema_form.php', '/e_sistema.php', '/e_sistema_done.php');
	          $exc_elemento = array ('/exc_elemento_form.php', '/exc_elemento_ask.php', '/exc_elemento.php');
	          $exc_evento = array ('/exc_evento_form.php', '/exc_evento_ask.php', '/exc_evento.php');
                    $exc_momento = array ('/exc_momento_form.php', '/exc_momento_ask.php', '/exc_momento.php');
                    $exc_usuario = array ('/exc_usuario_form.php', '/exc_usuario_ask.php', '/exc_usuario.php');
                    if (in_array('con_fer_sintatica', $this->consultar))
                    {
                    for ($i = 0; $i < count($con_fer_sintatica); $i++)
                    {
                             $this->flags[] = $con_fer_sintatica[$i];
                    }
                    }
                    if (in_array('con_evento', $this->consultar))
                    {
                    for ($i = 0; $i < count($con_evento); $i++)
                    {
                             $this->flags[] = $con_evento[$i];
                    }
                    }
                    if (in_array('inc_elemento', $this->incluir))
                    {
                    for ($i = 0; $i < count($inc_elemento); $i++)
                    {
                            $this->flags[] = $inc_elemento[$i];
                    }
                    }
                    if (in_array('inc_evento', $this->incluir))
                    {
                    for ($i = 0; $i < count($inc_evento); $i++)
                    {
                             $this->flags[] = $inc_evento[$i];
                    }
                    }
                    if (in_array('inc_momento', $this->incluir))
                    {
                    for ($i = 0; $i < count($inc_momento); $i++)
                    {
                             $this->flags[] = $inc_momento[$i];
                    }
                    }
                    if (in_array('inc_roteiro', $this->incluir))
                    {
                    for ($i = 0; $i < count($inc_roteiro); $i++)
                    {
                             $this->flags[] = $inc_roteiro[$i];
                    }
                    }
                    if (in_array('inc_usuario', $this->incluir))
                    {
                    for ($i = 0; $i < count($inc_usuario); $i++)
                    {
                             $this->flags[] = $inc_usuario[$i];
                    }
                    }
                    if (in_array('co_sistema', $this->manutencao))
                    {
                    for ($i = 0; $i < count($co_sistema); $i++)
                    {
                             $this->flags[] = $co_sistema[$i];
                    }
                    }
                    if (in_array('man_roteiro', $this->manutencao))
                    {
                    for ($i = 0; $i < count($man_roteiro); $i++)
                    {
                             $this->flags[] = $man_roteiro[$i];
                    }
                    }
                    if (in_array('exc_elemento', $this->excluir))
                    {
                    for ($i = 0; $i < count($exc_elemento); $i++)
                    {
                             $this->flags[] = $exc_elemento[$i];
                    }
                    }
                    if (in_array('exc_evento', $this->excluir))
                    {
                    for ($i = 0; $i < count($exc_evento); $i++)
                    {
                             $this->flags[] = $exc_evento[$i];
                    }
                    }
                    if (in_array('exc_momento', $this->excluir))
                    {
                    for ($i = 0; $i < count($exc_momento); $i++)
                    {
                             $this->flags[] = $exc_momento[$i];
                    }
                    }
                    if (in_array('exc_usuario', $this->excluir))
                    {
                    for ($i = 0; $i < count($exc_usuario); $i++)
                    {
                             $this->flags[] = $exc_usuario[$i];
                    }
                    }
          }
	function addUser()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$this->gerarFlags();
		$query = 'INSERT INTO users (nome, cpf, endereco, bairro, cidade, estado, email, cargo, id, senha, flags, criador, c_time) VALUES ("'. $this->nome .'", "'. $this->cpf .'", "'. $this->endereco .'", "'. $this->bairro .'", "'. $this->cidade .'", "'. $this->estado .'", "'. $this->email .'", "'. $this->cargo .'", "'. $this->id .'", "'. $this->senha .'", \''.serialize($this->flags).'\', '.$_SESSION['user'].', '.time().');';
		//echo $query;
		mysqli_query($con, $query);
		$sql->close();
	}
}
class Usuario
{
	var $user;
	var $pass;
	function __construct($user, $pass)
	{
		$this->user = $user;
		$this->pass = $pass;
	}
	function isBan()
	{
	          $sql = new Sql();
	          $con = $sql->connect();
	          $sql_query = "SELECT ban FROM users WHERE matricula = ".$this->user.";";
	          $ban = mysqli_query($con, $sql_query);
	          $sql->close();
	          return $ban;
	}
	function pageEnable()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$result = unserialize(@mysqli_result(mysqli_query('SELECT flags FROM users WHERE matricula = '.$this->user.';',$con),0));
                    $sql->close();
                    if (@in_array(str_replace('/sistema', '', $_SERVER['PHP_SELF']), $result) || @in_array(str_replace('/sistema/banpress', '', $_SERVER['PHP_SELF']), $result) || @in_array(str_replace('/sistema/cadastros_gerais', '', $_SERVER['PHP_SELF']), $result))
                    {
                    return true;
                    }
                    else
                    {
                    return true;
                    }
	}
	function securityVerify()
	{
		if ($this->user)
		{
                              if (!$this->isBan() && $this->pageEnable())
                              {
                              $return = true;
   			}
			else
			{
			$return = false;
			}
		}
		else
		{
			$return = false;
		}
		return $return;
	}
	function Login()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$login_query = 'SELECT matricula FROM users WHERE `id` = "'.$this->user.'" AND senha = "'.$this->pass.'";';
		$usuario = mysqli_query($con, $login_query);
		/* numeric array */
//		$row = mysqli_fetch_array($usuario);
		$row = mysqli_fetch_array($usuario, MYSQLI_NUM);
		$sql->close();
		if ($usuario)
		{
			return $row[0];
		}
		else
		{
			return false;
		}
	}
}
class Fatos
{
	var $type;
	var $codigo;
	var $nome;
	var $rotulo;
	var $erro;
	function __construct($type, $codigo, $nome, $rotulo)
	{
		$this->type = $type;
		$this->codigo = $codigo;
		$this->nome = $nome;
		$this->rotulo = $rotulo;
	}
	function getFato()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$fato = @mysqli_fetch_array(mysqli_query('SELECT * FROM modelo_sintatico WHERE (codigo = '.$this->codigo.' OR nome = "'.$this->nome.'") AND tipo = '.$this->getType().';',$con));
		$sql->close();
		return $fato;
	}
	function getType()
	{
		switch($this->type)
		{
			case 'acao':
				$ret = 1;
				break;
			case 'objeto':
				$ret = 2;
				break;
			case 'alvo':
				$ret = 3;
				break;
			case 'origem_destino':
				$ret = 4;
				break;
		}
		return $ret;
	}
	function ValidEntry()
	{
		$incluir = $this->getFato();
		if (!$incluir['codigo'] && $incluir['nome'] == '')
		{
			if (Validate::Codigo($this->codigo))
			{
				if (Validate::string($this->nome, 50))
				{
					if (Validate::string($this->rotulo, 10))
					{
						return true;
					}
					else
					{
						$this->erro = 'Erro no campo "Abreviatura". Nao pode ser em branco.';
						return false;
					}
				}
				else
				{
					$this->erro = 'Erro no campo "Nome". Nao pode ser em branco';
					return false;
				}
			}
			else
			{
				$this->erro = 'Erro no campo "Codigo", somente numeros, de 1 a 5 caracteres.'. $incluir['nome'];
				return false;
			}
		}
		else
		{
			$this->erro = 'Elemento existente.';
			return false;
		}
	}
	function InsertData()
	{
		if ($this->ValidEntry())
		{
			$sql = new Sql();
			$con = $sql->connect();
			$query = 'INSERT INTO modelo_sintatico (tipo, codigo, nome, rotulo, matricula, c_time) VALUES ('.$this->getType().', '.$this->codigo.', "'.$this->nome.'", "'.$this->rotulo.'", '.$_SESSION['user'].', '.time().');';
			$this->erro = $query;
			mysqli_query($query, $con);
			$sql->close();
			return true;
		}
		else
		{
			return false;
		}
	}
}
class Roteiro
{
	var $acao_cod;
	var $objeto_cod;
	var $alvo_cod;
	var $origem_cod;
	var $destino_cod;
	var $frase;
	var $rotulo;
	var $query;
	var $errorstring;
	var $uid;
	function __construct($frase, $acao_cod, $objeto_cod, $alvo_cod, $origem_cod, $destino_cod, $rotulo)
	{
		$this->frase = $frase;
		$this->acao_cod = $acao_cod;
		$this->alvo_cod = $alvo_cod;
		$this->objeto_cod = $objeto_cod;
		$this->origem_cod = $origem_cod;
		$this->destino_cod = $destino_cod;
		$this->rotulo = $rotulo;
	}
	function getRoteiro()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$dados = @mysqli_fetch_array(mysqli_query('SELECT * FROM roteiro WHERE frase = "'.$this->frase.'";',$con));
		$sql->close();
		return $dados;
	}
	function ValidarEntrada()
	{
	          if ($this->acao_cod && $this->alvo_cod && $this->objeto_cod && $this->origem_cod && $this->destino_cod)
	          {
		$roteiro = $this->getRoteiro();
		if (!$roteiro['frase'])
		{
			if (strlen($this->rotulo) <= 30)
			{
				return true;
			}
			else
			{
				$this->errorstring = 'Os rotulos devem conter no máximo 30 caracteres.';
				return false;
			}
		}
		else
		{
			$this->errorstring = 'O evento já existe.';
			return false;
		}
		}
		else
		{
                          $this->errorstring = 'Preencha todos os dados.';
		      return false;
		}
	}
	function addRoteiro()
	{
		if ($this->ValidarEntrada())
		{
			$sql = new Sql();
			$con = $sql->connect();
			mysqli_query('INSERT INTO roteiro (acao_cod, alvo_cod, objeto_cod, origem_cod, destino_cod, frase, rotulo, matricula, c_time) VALUES ('.$this->acao_cod.', '.$this->alvo_cod.', '.$this->objeto_cod.', '.$this->origem_cod.', '.$this->destino_cod.', "'.$this->frase.'", "'.$this->rotulo.'", '.$_SESSION['user'].', '.time().');', $con);
			$this->query = 'INSERT INTO roteiro (acao_cod, alvo_cod, objeto_cod, origem_cod, destino_cod, frase, rotulo, matricula, c_time) VALUES ('.$this->acao_cod.', '.$this->alvo_cod.', '.$this->objeto_cod.', '.$this->origem_cod.', '.$this->destino_cod.', "'.$this->frase.'", "'.$this->rotulo.'", '.$_SESSION['user'].', '.time().');';
			$sql->close();
			return true;
		}
		else
		{
			return false;
		}
	}
}
class Sistema_Momento
{
	var $tipo;
	var $sigla;
	var $nome;
	var $erro;
	function __construct($tipo, $sigla, $nome)
	{
		$this->tipo = $tipo;
		$this->sigla = $sigla;
		$this->nome = $nome;
	}
	function getSistema()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$sistema = @mysqli_fetch_array(mysqli_query('SELECT * FROM sistemas WHERE nome = "'.$this->nome.'";',$con));
		$sql->close();
		return $sistema;
	}
	function getMomento()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$modelo = @mysqli_fetch_array(mysqli_query('SELECT * FROM momentos WHERE nome = "'.$this->nome.'";',$con));
		$sql->close();
		return $modelo;
	}
	function ValidarEntrada()
	{
		switch ($this->tipo)
		{
			case 'momentos':
				$momento = $this->getMomento();
				if (!$momento['nome'])
				{
					if (Validate::string($this->nome, 200))
					{
						return true;
						break;
					}
					else
					{
						$this->erro = 'Erro no campo nome, de 1 a 200 caracteres.';
						return false;
						break;
					}
				}
				else
				{
					$this->erro = 'Modelo já existente.';
					return false;
					break;
				}
			case 'sistemas':
				$sistema = $this->getSistema();
				if (!$sistema['nome'])
				{
					if (Validate::string($this->nome, 200))
					{
						if (Validate::string($this->sigla, 10))
						{
							return true;
							break;
						}
						else
						{
							return false;
							break;
							$this->erro = 'Erro no campo sigla, de 1 a 10 caracteres.';
						}
					}
					else
					{
						return false;
						break;
						$this->erro = 'Erro no campo nome, de 1 a 200 caracteres.';
					}
				}
				else
				{
					return false;
					break;
					$this->erro = 'Modelo já existente.';
				}
		}
	}
	function InsertData()
	{
		if ($this->ValidarEntrada())
		{
			$sql = new Sql();
			$con = $sql->connect();
			switch ($this->tipo)
			{
				case 'momentos':
					mysqli_query('INSERT INTO momentos (nome, matricula, c_time) VALUES ("'.$this->nome.'", '.$_SESSION['user'].', '.time().');', $con);
					return true;
					break;
				case 'sistemas':
					mysqli_query('INSERT INTO sistemas (sigla, nome, matricula, c_time) VALUES ("'.$this->sigla.'","'.$this->nome.'", '.$_SESSION['user'].', '.time().');', $con);
					return true;
					break;
			}
			$sql->close();
		}
		else
		{
			return false;
		}
	}
}
class Consulta_Fatos
{
	var $part1 = array();
	var $part2 = array();
	var $part3 = array();
	var $part4 = array();
	var $lines = array();
	function MakeParts()
	{
		$sql = new Sql();
		$con = $sql->connect();
		for ($tipo = 1; $tipo <= 4; $tipo++)
		{
			$query = 'SELECT * FROM modelo_sintatico WHERE tipo = '.$tipo.' ORDER BY codigo ASC;';
			$result = mysqli_query($con, $query);
			while ($fetch = mysqli_fetch_array($result))
			{
				switch ($tipo) {
					case 1:
						$this->part1[] = '<td style="border: 1px solid black;">' . $fetch['codigo'] . '</td><td style="border: 1px solid black;">' . htmlentities($fetch['nome']) . '</td>';
						break;
					case 2:
						$this->part2[] = '<td style="border: 1px solid black;">' . $fetch['codigo'] . '</td><td style="border: 1px solid black;">' . htmlentities($fetch['nome']) . '</td>';
						break;
					case 3:
						$this->part3[] = '<td style="border: 1px solid black;">' . $fetch['codigo'] . '</td><td style="border: 1px solid black;">' . htmlentities($fetch['nome']) . '</td>';
						break;
					case 4:
						$this->part4[] = '<td style="border: 1px solid black;">' . $fetch['codigo'] . '</td><td style="border: 1px solid black;">' . htmlentities($fetch['nome']) . '</td>';
						break;
				}
			}
		}
		$sql->close();
	}
	function MakeLines()
	{
		$this->MakeParts();
		if (count($this->part1) >= count($this->part2) && count($this->part1) >= count($this->part3))
		{
			$loopcount = count($this->part1);
		}
		if (count($this->part2) >= count($this->part1) && count($this->part2) >= count($this->part3))
		{
			$loopcount = count($this->part2);
		}
		if (count($this->part3) >= count($this->part1) && count($this->part3) >= count($this->part2))
		{
			$loopcount = count($this->part3);
		}
		for ($i = 0; $i <= $loopcount; $i++) {
			if (!isset($this->part1[$i]))
			{
				$this->part1[$i] = '';
			}
			if (!isset($this->part2[$i]))
			{
				$this->part2[$i] = '';
			}
			if (!isset($this->part3[$i]))
			{
				$this->part3[$i] = '';
			}
			if (!isset($this->part4[$i]))
			{
				$this->part4[$i] = '';
			}
		}
		for ($i = 0; $i <= $loopcount; $i++)
		{
			if (!isset($this->part1[$i]))
			{
				$part1 = '<td></td><td></td>';
			}
			else
			{
				$part1 = $this->part1[$i];
			}
			if (!isset($this->part2[$i]))
			{
				$part2 = '<td></td><td></td>';
			}
			else
			{
				$part2= $this->part2[$i];
			}
			if (!isset($this->part3[$i]))
			{
				$part3 = '<td></td><td></td>';
			}
			else
			{
				$part3 = $this->part3[$i];
			}
			if (!isset($this->part4[$i]))
			{
				$part4 = '<td></td><td></td>';
			}
			else
			{
				$part4 = $this->part4[$i];
			}
			$this->lines[] = $part1 . $part2 . $part3 . $part4 . $part4;
		}
	}
}
class Consulta_Roteiro
{
	var $acao_cod;
	var $objeto_cod;
	var $alvo_cod;
	var $origem_cod;
	var $destino_cod;
	var $frase;
	var $rotulo;
	var $sl;
	var $cod_contabil;
	var $in_vigencia;
	var $fim_vigencia;
	var $uid;
	function __construct($uid)
	{
		$this->uid = $uid;
		$info = $this->getInfo();
		$this->frase = $info['frase'];
		$this->acao_cod = $info['acao_cod'];
		$this->objeto_cod = $info['objeto_cod'];
		$this->alvo_cod = $info['alvo_cod'];
		$this->origem_cod = $info['origem_cod'];
		$this->destino_cod = $info['destino_cod'];
		$this->rotulo = $info['rotulo'];
		$this->sl = $info['sl'];
		$this->cod_contabil = $info['codigo_contabil'];
		$this->in_vigencia = $info['inicio_vigencia'];
		$this->fim_vigencia = $info['fim_vigencia'];
		$this->ic_cancelado = $info['ic_cancelado'];
	}
	function getInfo()
	{
		$sql = new Sql();
		$con = $sql->connect();
		$info = mysqli_fetch_array(mysqli_query('SELECT * FROM roteiro WHERE uid = "'.$this->uid.'";', $con));
		$sql->close();
		return $info;
	}
}
class Produtos
{
          var $NU_PRODUTO;
          var $NO_PRODUTO;
          var $DT_INICIO;
          var $DT_FIM;
          var $IC_CANCELADO;
          var $errorstr;
          function __construct($NU_PRODUTO)
          {
                $this->NU_PRODUTO = $NU_PRODUTO;
                if ($this->exist())
                    $this->getInfo();
          }
          function exist()
          {
                $sql = new Sql();
                $con = $sql->connect();
                $no_prod = mysqli_query($con, "SELECT NO_PRODUTO FROM tabela_produtos WHERE NU_PRODUTO = $this->NU_PRODUTO;");
                $no_produto = mysqli_num_rows($no_prod);
                $sql->close();
                if ($no_produto)
                   return true;
                else
                   return false;
          }
          function getInfo()
          {
                $sql = new Sql();
                $con = $sql->connect();
                $dados = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tabela_produtos WHERE NU_PRODUTO = $this->NU_PRODUTO;"));
                $sql->close();
                $this->NO_PRODUTO = $dados['NO_PRODUTO'];
                $this->DT_INICIO = @date('d/m/Y', $dados['DT_INICIO']);
                $this->DT_FIM = @date('d/m/Y', $dados['DT_FIM']);
                $this->IC_CANCELADO = $dados['IC_CANCELADO'];
          }
          function salvar()
          {
                $sql = new Sql();
                if (!$this->DT_FIM)
                {
                      $this->DT_FIM = 2145852000;
                }
                if ($this->NO_PRODUTO && $this->DT_INICIO)
                {
                if ($this->exist())
                {
                      $con = $sql->connect();
                      $movimento_antigo = @mysqli_result(mysqli_query("SELECT DT_MOVIMENTO FROM tabela_movimento WHERE NU_PRODUTO = $this->NU_PRODUTO ORDER BY DT_MOVIMENTO ASC LIMIT 1;",$con),0);
                      $movimento_novo = @mysqli_result(mysqli_query("SELECT DT_MOVIMENTO FROM tabela_movimento WHERE NU_PRODUTO = $this->NU_PRODUTO ORDER BY DT_MOVIMENTO DESC LIMIT 1;",$con),0);
                      if ($movimento_antigo)
                      {
                           $movimento_a = @strtotime($movimento_antigo);
                           $movimento_n = @strtotime($movimento_novo);
                           if ($this->DT_INICIO > $movimento_a)
                           {
                                $this->errorstr = "Operação não realizada - Existe um movimento referente a esse produto anterior a data de inicio.";
                                return false;
                           }
                           if ($this->DT_FIM < $movimento_n)
                           {
                                $this->errorstr = "Operação não realizada - Existe um movimento referente a esse produto posterior a data final.";
                                return false;
                           }
                      }
                      $nome_antigo = mysqli_result(mysqli_query("SELECT NO_PRODUTO FROM tabela_produtos WHERE NU_PRODUTO = $this->NU_PRODUTO;",$con),0);
                      if (!Validate::produtoExistente($this->NO_PRODUTO) || $nome_antigo == $this->NO_PRODUTO)
                      {
                         $con = $sql->connect();
                         mysqli_query("UPDATE tabela_produtos SET NO_PRODUTO = '$this->NO_PRODUTO', DT_INICIO = $this->DT_INICIO, DT_FIM = $this->DT_FIM, IC_CANCELADO = '$this->IC_CANCELADO' WHERE NU_PRODUTO = $this->NU_PRODUTO",$con);
                         return true;
                      }
                      else
                      {
                         $this->errorstr = "Operação não realizada - Já existe um produto com esse nome.";
                         return false;
                      }
                }
                else
                {
                      if (!Validate::produtoExistente($this->NO_PRODUTO))
                      {
                         $con = $sql->connect();
                         mysqli_query("INSERT INTO tabela_produtos (NO_PRODUTO, DT_INICIO, DT_FIM, IC_CANCELADO, CO_USUARIO, CO_TERMINAL, CO_APLICACAO, TS_CNTRE_ATLZO) VALUES ('$this->NO_PRODUTO', $this->DT_INICIO, $this->DT_FIM, 'N', ".$_SESSION['user'].", '', '', ".time().");",$con) or die(mysqli_error());
                         return true;
                      }
                      else
                      {
                         $this->errorstr = "Operação não realizada - Já existe um produto com esse nome.";
                         return false;
                      }
                }
                }
                else
                {
                      $this->errorstr = "Operação não realizada - É necessário o preenchimento do Nome e da Data de Inicio.";
                      return false;
                }
                $sql->close();
          }
}
class Acoes
{
          var $codigo;
          var $nome;
          function __construct($codigo)
          {
                $this->codigo = $codigo;
                if ($this->exist())
                    $this->getInfo();
          }
          function exist()
          {
                $sql = new Sql();
                $con = $sql->connect();
                $no_produto = @mysqli_result(mysqli_query("SELECT nome FROM acoes_bloqueio WHERE codigo = $this->codigo ;",$con),0);
                $sql->close();
                if ($no_produto)
                   return true;
                else
                   return false;
          }
          function getInfo()
          {
                $sql = new Sql();
                $con = $sql->connect();
                $dados = mysqli_fetch_array(mysqli_query("SELECT * FROM acoes_bloqueio WHERE codigo = $this->codigo ;",$con));
                $sql->close();
                $this->nome = $dados['nome'];
          }
}
class Processamento
{
          var $codigo;
          var $nome;
          var $data;
          function __construct($codigo)
          {
                $this->codigo = $codigo;
                if ($this->exist())
                    $this->getInfo();
          }
          function exist()
          {
                $sql = new Sql();
                $con = $sql->connect();
                $no_produto = @mysqli_result(mysqli_query("SELECT NOME FROM controle_processamento WHERE CODIGO = $this->codigo ;",$con),0);
                $sql->close();
                if ($no_produto)
                   return true;
                else
                   return false;
          }
          function getInfo()
          {
                $sql = new Sql();
                $con = $sql->connect();
                $dados = mysqli_fetch_array(mysqli_query("SELECT * FROM controle_processamento WHERE CODIGO = $this->codigo ;",$con));
                $sql->close();
                $this->nome = $dados['NOME'];
                $this->data = @strtotime($dados['DT_ULTIMO_PROCESSAMENTO']);
          }
}
class Participantes
{
          var $NU_CONTRATO;
          var $COD_PARTICIPANTE;
          var $TIPO_PARTICIPANTE;
          var $NOME_PARTICIPANTE;
          var $DT_NASCIMENTO;
          var $endereco;
          var $numero;
          var $complemento;
          var $bairro;
          var $cidade;
          var $estado;
          var $telefone;
          var $cep;
          var $cpf_cnpj;
          var $email;
          var $renda;
          var $errorstr;
          function __construct($COD_PARTICIPANTE)
          {
                  $this->COD_PARTICIPANTE = $COD_PARTICIPANTE;
                  if ($this->exist())
                       $this->getInfo();
          }
          function exist()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $nome1 = mysqli_query($con, "SELECT NOME_PARTICIPANTE FROM participantes WHERE COD_PARTICIPANTE = $this->COD_PARTICIPANTE;");
                  $nome = mysqli_num_rows($nome1);
                  $sql->close();
                  if ($nome)
                     return true;
                  else
                     return false;
          }
          function getInfo()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $dados = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM participantes WHERE COD_PARTICIPANTE = $this->COD_PARTICIPANTE;"),MYSQLI_BOTH);
                  $sql->close();
                  $this->NU_CONTRATO = $dados['NU_CONTRATO'];
                  $this->TIPO_PARTICIPANTE = $this->tipoParticipante($dados['TIPO_PARTICIPANTE']);
                  $this->NOME_PARTICIPANTE = $dados['NOME_PARTICIPANTE'];
                  $this->DT_NASCIMENTO = @strtotime($dados['DT_NASCIMENTO']);
                  $this->endereco = $dados['endereço'];
                  $this->numero = $dados['numero'];
                  $this->complemento = $dados['complemento'];
                  $this->bairro = $dados['bairro'];
                  $this->cidade = $dados['cidade'];
                  $this->estado = $dados['estado'];
                  $this->telefone = $dados['telefone'];
                  $this->cep = $dados['cep'];
                  $this->cpf_cnpj = $dados['cpf/cnpj'];
                  $this->email = $dados['email'];
                  $this->renda = $dados['renda'];
          }
          function tipoParticipante($tipo)
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $nome1 = mysqli_query($con, "SELECT nome FROM tipo_participante WHERE codigo = $tipo;");
                  $nome = mysqli_num_rows($nome1);
                  $sql->close();
                  return $nome;
          }
          function salvar()
          {
                  if ($this->exist())
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->NOME_PARTICIPANTE && $this->endereco && $this->numero && $this->bairro && $this->cidade && $this->estado && $this->telefone && $this->cep && $this->telefone && $this->email && $this->renda)
                       {
                             if (is_numeric($this->numero))
                             {
                                   if (Validate_ptBR::phoneNumber($this->telefone))
                                   {
                                         if (Validate_ptBR::postalCode($this->cep))
                                         {
                                              if (Validate1::email($this->email))
                                                     {
                                                           mysqli_query("UPDATE participantes SET `NOME_PARTICIPANTE` = '$this->NOME_PARTICIPANTE', `endereço` = '$this->endereco', `numero` = $this->numero, `complemento` = '$this->complemento', `bairro` = '$this->bairro', `cidade` = '$this->cidade', `estado` = '$this->estado', `telefone` = '$this->telefone', `cep` = '$this->cep', `cpf/cnpj` = '$this->cpf_cnpj', `email` = '$this->email', `renda` = $this->renda WHERE COD_PARTICIPANTE = $this->COD_PARTICIPANTE;",$con);
//                                                           die ("UPDATE participantes SET `NOME_PARTICIPANTE` = '$this->NOME_PARTICIPANTE', `endereço` = '$this->endereco', `numero` = $this->numero, `complemento` = '$this->complemento', `bairro` = '$this->bairro', `cidade` = '$this->cidade', `estado` = '$this->estado', `telefone` = '$this->telefone', `cep` = '$this->cep', `cpf/cnpj` = '$this->cpf_cnpj', `email` = '$this->email', `renda` = $this->renda WHERE COD_PARTICIPANTE = $this->COD_PARTICIPANTE;");
                                                           return true;
                                                     }
                                                     else
                                                     {
                                                           $this->errorstr = "Email inválido.";
                                                           return false;
                                                     }
                                         }
                                         else
                                         {
                                               $this->errorstr = "CEP inválido.";
                                               return false;
                                         }
                                   }
                                   else
                                   {
                                         $this->errorstr = "Telefone inválido.";
                                         return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "O campo Num. é númericos.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "É obrigatório o preenchimento de todos os campos (exceto Complemento).";
                             return false;
                       }

                  }
                  else
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->NU_CONTRATO && $this->TIPO_PARTICIPANTE && $this->NOME_PARTICIPANTE && ($this->DT_NASCIMENTO != '1969-12-31') && $this->endereco && $this->numero && $this->bairro && $this->cidade && $this->estado && $this->telefone && $this->cep && $this->telefone && $this->cpf_cnpj && $this->email && $this->renda)
                       {
                             $NU_CONTRATO = mysqli_result(mysqli_query("SELECT `NU_CONTRATO`FROM contrato WHERE NU_CONTRATO = $this->NU_CONTRATO;",$con),0);
                             if (!$NU_CONTRATO)
                             {
                                   $this->errorstr = "O contrato deve estar previamente cadastrado.";
                                   return false;
                             }
                             if (is_numeric($this->numero))
                             {
                                   if (Validate_ptBR::phoneNumber($this->telefone))
                                   {
                                         if (Validate_ptBR::postalCode($this->cep))
                                         {
                                               if (Validate_ptBR::cpf($this->cpf_cnpj) || Validate_ptBR::cnpj($this->cpf_cnpj))
                                               {
                                                     if(Validate1::email($this->email))
                                                     {
                                                           mysqli_query("INSERT INTO participantes (NU_CONTRATO, TIPO_PARTICIPANTE, NOME_PARTICIPANTE, DT_NASCIMENTO, endereço, numero, complemento, bairro, cidade, estado, telefone, cep, `cpf/cnpj`, email, renda)
                                                                                           VALUES ($this->NU_CONTRATO, $this->TIPO_PARTICIPANTE, '$this->NOME_PARTICIPANTE', '$this->DT_NASCIMENTO', '$this->endereco', $this->numero, '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->telefone', '$this->cep', '$this->cpf_cnpj', '$this->email', $this->renda);",$con);
                                                           return true;
                                                     }
                                                     else
                                                     {
                                                           $this->errorstr = "Email inválido.";
                                                           return false;
                                                     }
                                               }
                                               else
                                               {
                                                     $this->errorstr = "CPF/CNPJ inválido.";
                                                     return false;
                                               }
                                         }
                                         else
                                         {
                                               $this->errorstr = "CEP inválido.";
                                               return false;
                                         }
                                   }
                                   else
                                   {
                                         $this->errorstr = "Telefone inválido.";
                                         return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "Os campos Num. é númericos.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "É obrigatório o preenchimento de todos os campos (exceto Complemeto).";
                             return false;
                       }

                  }
          }
}
class Imoveis
{
          var $NU_CONTRATO;
          var $COD_IMOVEL;
          var $VL_AVALIACAO;
          var $VL_VENDA;
          var $VL_VENAL;
          var $VL_BRUTO;
          var $VL_RENDA;
          var $registro;
          var $endereco;
          var $numero;
          var $complemento;
          var $bairro;
          var $cidade;
          var $estado;
          var $cep;
          var $padrao;
          var $tipo;
          var $errorstr;
          function __construct($COD_IMOVEL)
          {
                  $this->COD_IMOVEL = $COD_IMOVEL;
                  if ($this->exist())
                       $this->getInfo();
          }
          function exist()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $nome = @mysqli_result(mysqli_query("SELECT VL_AVALIACAO FROM imoveis WHERE COD_IMOVEL = $this->COD_IMOVEL;", $con),0);
                  $sql->close();
                  if ($nome)
                     return true;
                  else
                     return false;
          }
          function getInfo()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $dados = mysqli_fetch_array(mysqli_query("SELECT * FROM imoveis WHERE COD_IMOVEL = $this->COD_IMOVEL;",$con),0);
                  $sql->close();
                  $this->NU_CONTRATO = $dados['NU_CONTRATO'];
                  $this->VL_AVALIACAO = $dados['VL_AVALIACAO'];
                  $this->VL_VENDA = $dados['VL_VENDA'];
                  $this->VL_VENAL = $dados['VL_VENAL'];
                  $this->VL_BRUTO = $dados['VL_BRUTO'];
                  $this->VL_RENDA = $dados['VL_RENDA'];
                  $this->registro = $dados['registro'];
                  $this->endereco = $dados['endereco'];
                  $this->complemento = $dados['complemento'];
                  $this->numero = $dados['numero'];
                  $this->bairro = $dados['bairro'];
                  $this->cidade = $dados['cidade'];
                  $this->estado = $dados['estado'];
                  $this->cep = $dados['cep'];
                  $this->padrao = $this->tipoPadrao($dados['padrao']);
                  $this->tipo = $this->tipoConstrucao($dados['TIPO_CONSTRUCAO']);
          }
          function tipoPadrao($tipo, $reverse=null)
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  if ($reverse)
                      $nome = mysqli_result(mysqli_query("SELECT COD_PADRAO FROM imovel_padrao WHERE NOME_PADRAO = '$tipo';",$con),0);
                  else
                      $nome = mysqli_result(mysqli_query("SELECT NOME_PADRAO FROM imovel_padrao WHERE COD_PADRAO = $tipo;",$con),0);
                  $sql->close();
                  return $nome;
          }
          function tipoConstrucao($tipo, $reverse=null)
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  if ($reverse)
                     $nome = mysqli_result(mysqli_query("SELECT COD_TIPO_CONSTRUCAO FROM imovel_tipo_construcao WHERE NOME_TIPO_CONSTRUCAO = '$tipo';",$con),0);
                  else
                     $nome = mysqli_result(mysqli_query("SELECT NOME_TIPO_CONSTRUCAO FROM imovel_tipo_construcao WHERE COD_TIPO_CONSTRUCAO = $tipo;",$con),0);
                  $sql->close();
                  return $nome;
          }
          function salvar()
          {
                  if ($this->exist())
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->VL_AVALIACAO && $this->VL_VENDA && $this->VL_VENAL && $this->VL_BRUTO && $this->VL_RENDA && $this->registro && $this->endereco && $this->numero && $this->bairro && $this->cidade && $this->estado && $this->cep && $this->padrao && $this->tipo)
                       {
                             if (is_numeric($this->numero) && is_numeric($this->VL_AVALIACAO) && is_numeric($this->VL_VENDA) && is_numeric($this->VL_VENAL) && is_numeric($this->VL_BRUTO) && is_numeric($this->VL_RENDA))
                             {
                                   if (Validate_ptBR::postalCode($this->cep))
                                   {
                                          mysqli_query("UPDATE imoveis SET VL_AVALIACAO = $this->VL_AVALIACAO, VL_VENDA = $this->VL_VENDA, VL_VENAL = $this->VL_VENAL, VL_BRUTO = $this->VL_BRUTO, VL_RENDA = $this->VL_RENDA, registro = '$this->registro', endereco = '$this->endereco', numero = $this->numero, complemento = '$this->complemento', bairro = '$this->bairro', cidade = '$this->cidade', estado = '$this->estado', cep = '$this->cep', padrao = $this->padrao, TIPO_CONSTRUCAO = $this->tipo WHERE COD_IMOVEL = $this->COD_IMOVEL;",$con);
//                                          die ("UPDATE imoveis SET VL_AVALIACAO = $this->VL_AVALIACAO, VL_VENDA = $this->VL_VENDA, VL_VENAL = $this->VL_VENAL, VL_BRUTO = $this->VL_BRUTO, VL_RENDA = $this->VL_RENDA, registro = '$this->registro', endereco = '$this->endereco', numero = $this->numero, complemento = '$this->complemento', bairro = '$this->bairro', cidade = '$this->cidade', estado = '$this->estado', cep = '$this->cep', padrao = $this->padrao, TIPO_CONSTRUCAO = $this->tipo WHERE COD_IMOVEL = $this->COD_IMOVEL;");
                                          return true;
                                   }
                                   else
                                   {
                                          $this->errorstr = "CEP inválido.";
                                          return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "O campo número e os valores são númericos. Se estiver usando a virgula substitua pelo ponto.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "Todos os campos (exceto complemento) precisam ser obrigatoriamente preenchidos.";
                             return false;
                       }

                  }
                  else
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->NU_CONTRATO && $this->VL_AVALIACAO && $this->VL_VENDA && $this->VL_VENAL && $this->VL_BRUTO && $this->VL_RENDA && $this->registro && $this->endereco && $this->numero && $this->bairro && $this->cidade && $this->estado && $this->cep && $this->padrao && $this->tipo)
                       {
                             $NU_CONTRATO = mysqli_result(mysqli_query("SELECT `NU_CONTRATO`FROM contrato WHERE NU_CONTRATO = $this->NU_CONTRATO;",$con),0);
                             if (!$NU_CONTRATO)
                             {
                                   $this->errorstr = "O contrato deve estar previamente cadastrado.";
                                   return false;
                             }
                             if (is_numeric($this->numero) && is_numeric($this->VL_AVALIACAO) && is_numeric($this->VL_VENDA) && is_numeric($this->VL_VENAL) && is_numeric($this->VL_BRUTO) && is_numeric($this->VL_RENDA))
                             {
                                   if (Validate_ptBR::postalCode($this->cep))
                                   {
                                          mysqli_query("INSERT INTO imoveis (NU_CONTRATO, VL_AVALIACAO, VL_VENDA, VL_VENAL, VL_BRUTO, VL_RENDA, registro, endereco, numero, complemento, bairro, cidade, estado, cep, padrao, TIPO_CONSTRUCAO)
                                                              VALUES ($this->NU_CONTRATO, $this->VL_AVALIACAO, $this->VL_VENDA, $this->VL_VENAL, $this->VL_BRUTO, $this->VL_RENDA, '$this->registro', '$this->endereco', $this->numero, '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->cep', $this->padrao, $this->tipo);",$con);
                                          //die ("INSERT INTO imoveis (VL_AVALIACAO, VL_VENDA, VL_VENAL, VL_BRUTO, VL_RENDA, endereco, numero, complemento, bairro, cidade, estado, cep)
                                            //                  VALUES ($this->VL_AVALIACAO, $this->VL_VENDA, $this->VL_VENAL, $this->VL_BRUTO, $this->VL_RENDA, '$this->endereco', $this->numero, '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->cep');");
                                          return true;
                                   }
                                   else
                                   {
                                          $this->errorstr = "CEP inválido.";
                                          return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "O campo número e os valores são númericos. Se estiver usando a virgula substitua pelo ponto.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "Todos os campos (exceto complemento) precisam ser obrigatoriamente preenchidos.";
                             return false;
                       }
                  }
          }
}
class Contratos
{
          var $NU_CONTRATO;
          var $ORIGEM;
          var $SIS_AMORTIZACAO;
          var $TX_JUROS;
          var $PRAZO_AMORTIZACAO;
          var $PRAZO_PRORROGACAO;
          var $NU_PRESTACAO;
          var $NU_PRESTACAO_EMITIDAS;
          var $DT_ASSINATURA;
          var $DT_VENCIMENTO;
          var $NU_REGRA_EVOLUCAO;
          var $APOLICE;
          var $SEGURADORA;
          var $PAC_RENDA;
          var $BLOQ1;
          var $BLOQ2;
          var $BLOQ3;
          var $BLOQ4;
          var $BLOQ5;
          var $BLOQ6;
          var $BLOQ7;
          var $BLOQ8;
          var $BLOQ9;
          var $BLOQ10;
          var $action;
          var $errorstr;
          function __construct($NU_CONTRATO)
          {
                  $this->NU_CONTRATO = $NU_CONTRATO;
                  if ($this->exist())
                       $this->getInfo();
          }
          function exist()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $nome1 = mysqli_query($con, "SELECT ORIGEM FROM contrato WHERE NU_CONTRATO = $this->NU_CONTRATO;");
                  $nome = mysqli_num_rows($nome1);
                  $sql->close();
                  if ($nome)
                     return true;
                  else
                     return false;
          }
          function getInfo()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $dados = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM contrato WHERE NU_CONTRATO = $this->NU_CONTRATO;"),MYSQLI_BOTH);
                  $sql->close();
                  $this->ORIGEM = $dados['ORIGEM'];
                  $this->SIS_AMORTIZACAO = $dados['SIS_AMORTIZACAO'];
                  $this->TX_JUROS = $dados['TX_JUROS'];
                  $this->PRAZO_AMORTIZACAO = $dados['PRAZO_AMORTIZACAO'];
                  $this->PRAZO_PRORROGACAO = $dados['PRAZO_PRORROGACAO'];
                  $this->NU_PRESTACAO = $dados['NU_PRESTACAO'];
                  $this->NU_PRESTACAO_EMITIDAS = $dados['NU_PRESTACAO_EMITIDAS'];
                  $this->DT_ASSINATURA = @strtotime($dados['DT_ASSINATURA']);
                  $this->DT_VENCIMENTO = @strtotime($dados['DT_VENCIMENTO']);
                  $this->NU_REGRA_EVOLUCAO = $dados['NU_REGRA_EVOLUCAO'];
                  $this->APOLICE = $dados['APOLICE'];
                  $this->SEGURADORA = $dados['SEGURADORA'];
                  $this->PAC_RENDA = $dados['PAC_RENDA'];
                  $this->BLOQ1 = $dados['BLOQ1'];
                  $this->BLOQ2 = $dados['BLOQ2'];
                  $this->BLOQ3 = $dados['BLOQ3'];
                  $this->BLOQ4 = $dados['BLOQ4'];
                  $this->BLOQ5 = $dados['BLOQ5'];
                  $this->BLOQ6 = $dados['BLOQ6'];
                  $this->BLOQ7 = $dados['BLOQ7'];
                  $this->BLOQ8 = $dados['BLOQ8'];
                  $this->BLOQ9 = $dados['BLOQ9'];
                  $this->BLOQ10 = $dados['BLOQ10'];
          }
          function sisAmortizacao($int)
          {
                  switch ($int)
                  {
                        case 1:
                           $ret = 'Price';
                           break;
                        case 2:
                           $ret = 'SAC';
                           break;
                  }
                  return $ret;
          }
          function salvar()
          {
                  if ($this->action == 2)
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if (true)
                       {
                             if (is_numeric($this->numero) && is_numeric($this->VL_AVALIACAO) && is_numeric($this->VL_VENDA) && is_numeric($this->VL_VENAL) && is_numeric($this->VL_BRUTO) && is_numeric($this->VL_RENDA))
                             {
                                   if (Validate_ptBR::postalCode($this->cep))
                                   {
                                          mysqli_query("UPDATE imoveis SET VL_AVALIACAO = $this->VL_AVALIACAO, VL_VENDA = $this->VL_VENDA, VL_VENAL = $this->VL_VENAL, VL_BRUTO = $this->VL_BRUTO, VL_RENDA = $this->VL_RENDA, registro = '$this->registro', endereco = '$this->endereco', numero = $this->numero, complemento = '$this->complemento', bairro = '$this->bairro', cidade = '$this->cidade', estado = '$this->estado', cep = '$this->cep', padrao = $this->padrao, TIPO_CONSTRUCAO = $this->tipo WHERE COD_IMOVEL = $this->COD_IMOVEL;",$con);
//                                          die ("UPDATE imoveis SET VL_AVALIACAO = $this->VL_AVALIACAO, VL_VENDA = $this->VL_VENDA, VL_VENAL = $this->VL_VENAL, VL_BRUTO = $this->VL_BRUTO, VL_RENDA = $this->VL_RENDA, registro = '$this->registro', endereco = '$this->endereco', numero = $this->numero, complemento = '$this->complemento', bairro = '$this->bairro', cidade = '$this->cidade', estado = '$this->estado', cep = '$this->cep', padrao = $this->padrao, TIPO_CONSTRUCAO = $this->tipo WHERE COD_IMOVEL = $this->COD_IMOVEL;");
                                          return true;
                                   }
                                   else
                                   {
                                          $this->errorstr = "CEP inválido.";
                                          return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "O campo número e os valores são númericos. Se estiver usando a virgula substitua pelo ponto.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "Todos os campos (exceto complemento) precisam ser obrigatoriamente preenchidos.";
                             return false;
                       }

                  }
                  else
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->NU_CONTRATO && $this->ORIGEM && $this->SIS_AMORTIZACAO && $this->TX_JUROS && $this->PRAZO_AMORTIZACAO && $this->NU_PRESTACAO && $this->DT_ASSINATURA && $this->DT_VENCIMENTO && $this->NU_REGRA_EVOLUCAO && $this->APOLICE && $this->SEGURADORA)
                       {
                             $NU_CONTRATO = @mysqli_result(mysqli_query("SELECT NU_CONTRATO FROM contrato WHERE NU_CONTRATO = $this->NU_CONTRATO;",$con),0);
                             if ($NU_CONTRATO)
                             {
                                  $this->errorstr = "Já existe um contrato com esse número.";
                                  return false;
                             }
                             if (is_numeric($this->NU_CONTRATO) && is_numeric($this->ORIGEM) && is_numeric($this->PRAZO_AMORTIZACAO) && is_numeric($this->NU_REGRA_EVOLUCAO) && is_numeric($this->APOLICE) && is_numeric($this->SEGURADORA))
                             {
                                  mysqli_query("INSERT INTO contrato (NU_CONTRATO, ORIGEM, SIS_AMORTIZACAO, TX_JUROS, PRAZO_AMORTIZACAO, PRAZO_PRORROGACAO, NU_PRESTACAO, DT_ASSINATURA, DT_VENCIMENTO, NU_REGRA_EVOLUCAO, APOLICE, SEGURADORA, PAC_RENDA)
                                                            VALUES  ($this->NU_CONTRATO, $this->ORIGEM, $this->SIS_AMORTIZACAO, $this->TX_JUROS, $this->PRAZO_AMORTIZACAO, $this->PRAZO_PRORROGACAO, $this->NU_PRESTACAO, '$this->DT_ASSINATURA', '$this->DT_VENCIMENTO', $this->NU_REGRA_EVOLUCAO, $this->APOLICE, $this->SEGURADORA, $this->PAC_RENDA);",$con);
                                  return true;
                             }
                             else
                             {
                                  $this->errorstr = "Todos os campos são númericos.";
                                  return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "Todos os campos (exceto Prazo de Prorrogação) precisam ser preenchidos.";
                             return false;
                       }
                  }
          }
}
class Seguradoras
{
          var $COD_SEGURADORA;
          var $NOME;
          var $endereco;
          var $numero;
          var $complemento;
          var $bairro;
          var $cidade;
          var $estado;
          var $telefone;
          var $cep;
          var $cpf_cnpj;
          var $email;
          var $errorstr;
          function __construct($COD_SEGURADORA)
          {
                  $this->COD_SEGURADORA = $COD_SEGURADORA;
                  if ($this->exist())
                       $this->getInfo();
          }
          function exist()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $nome = @mysqli_result(mysqli_query("SELECT NOME FROM seguradoras WHERE COD_SEGURADORA = $this->COD_SEGURADORA;", $con),0);
                  $sql->close();
                  if ($nome)
                     return true;
                  else
                     return false;
          }
          function getInfo()
          {
                  $sql = new Sql();
                  $con = $sql->connect();
                  $dados = mysqli_fetch_array(mysqli_query("SELECT * FROM seguradoras WHERE COD_SEGURADORA = $this->COD_SEGURADORA;",$con),0);
                  $sql->close();
                  $this->NOME = $dados['NOME'];
                  $this->endereco = $dados['endereço'];
                  $this->numero = $dados['numero'];
                  $this->complemento = $dados['complemento'];
                  $this->bairro = $dados['bairro'];
                  $this->cidade = $dados['cidade'];
                  $this->estado = $dados['estado'];
                  $this->telefone = $dados['telefone'];
                  $this->cep = $dados['cep'];
                  $this->cpf_cnpj = $dados['cpf/cnpj'];
                  $this->email = $dados['email'];
          }
          function salvar()
          {
                  if ($this->exist())
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->NOME && $this->endereco && $this->numero && $this->bairro && $this->cidade && $this->estado && $this->telefone && $this->cep && $this->telefone && $this->email)
                       {
                             if (is_numeric($this->numero))
                             {
                                   if (Validate_ptBR::phoneNumber($this->telefone))
                                   {
                                         if (Validate_ptBR::postalCode($this->cep))
                                         {
                                              if (Validate1::email($this->email))
                                                     {
                                                           mysqli_query("UPDATE participantes SET `NOME_PARTICIPANTE` = '$this->NOME_PARTICIPANTE', `endereço` = '$this->endereco', `numero` = $this->numero, `complemento` = '$this->complemento', `bairro` = '$this->bairro', `cidade` = '$this->cidade', `estado` = '$this->estado', `telefone` = '$this->telefone', `cep` = '$this->cep', `cpf/cnpj` = '$this->cpf_cnpj', `email` = '$this->email', `renda` = $this->renda WHERE COD_PARTICIPANTE = $this->COD_PARTICIPANTE;",$con);
//                                                           die ("UPDATE participantes SET `NOME_PARTICIPANTE` = '$this->NOME_PARTICIPANTE', `endereço` = '$this->endereco', `numero` = $this->numero, `complemento` = '$this->complemento', `bairro` = '$this->bairro', `cidade` = '$this->cidade', `estado` = '$this->estado', `telefone` = '$this->telefone', `cep` = '$this->cep', `cpf/cnpj` = '$this->cpf_cnpj', `email` = '$this->email', `renda` = $this->renda WHERE COD_PARTICIPANTE = $this->COD_PARTICIPANTE;");
                                                           return true;
                                                     }
                                                     else
                                                     {
                                                           $this->errorstr = "Email inválido.";
                                                           return false;
                                                     }
                                         }
                                         else
                                         {
                                               $this->errorstr = "CEP inválido.";
                                               return false;
                                         }
                                   }
                                   else
                                   {
                                         $this->errorstr = "Telefone inválido.";
                                         return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "O campo Num. é númericos.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "É obrigatório o preenchimento de todos os campos (exceto Complemento).";
                             return false;
                       }

                  }
                  else
                  {
                       include("ptBR.php");
                       include("Validate.php");
                       $sql = new Sql();
                       $con = $sql->connect();
                       if ($this->origem_destino && $this->NOME && $this->endereco && $this->numero && $this->bairro && $this->cidade && $this->estado && $this->telefone && $this->cep && $this->telefone && $this->cpf_cnpj && $this->email)
                       {
                             if (is_numeric($this->numero))
                             {
                                   if (Validate_ptBR::phoneNumber($this->telefone))
                                   {
                                         if (Validate_ptBR::postalCode($this->cep))
                                         {
                                               if (Validate_ptBR::cpf($this->cpf_cnpj) || Validate_ptBR::cnpj($this->cpf_cnpj))
                                               {
                                                     if(Validate1::email($this->email))
                                                     {
                                                           mysqli_query("INSERT INTO seguradoras (NOME, ORIGEM_DESTINO, endereco, numero, complemento, bairro, cidade, estado, telefone, cep, `cnpj`, email)
                                                                                           VALUES ('$this->NOME', $this->origem_destino, '$this->endereco', $this->numero, '$this->complemento', '$this->bairro', '$this->cidade', '$this->estado', '$this->telefone', '$this->cep', '$this->cpf_cnpj', '$this->email');",$con);
                                                           return true;
                                                     }
                                                     else
                                                     {
                                                           $this->errorstr = "Email inválido.";
                                                           return false;
                                                     }
                                               }
                                               else
                                               {
                                                     $this->errorstr = "CPF/CNPJ inválido.";
                                                     return false;
                                               }
                                         }
                                         else
                                         {
                                               $this->errorstr = "CEP inválido.";
                                               return false;
                                         }
                                   }
                                   else
                                   {
                                         $this->errorstr = "Telefone inválido.";
                                         return false;
                                   }
                             }
                             else
                             {
                                   $this->errorstr = "Os campos Número é númerico.";
                                   return false;
                             }
                       }
                       else
                       {
                             $this->errorstr = "É obrigatório o preenchimento de todos os campos (exceto Complemeto).";
                             return false;
                       }

                  }
          }
}
?>
