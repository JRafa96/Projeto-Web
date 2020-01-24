<?php
class ConexaoBD
{
	private $host;
	private $dbname;
	private $user;
	private $password;

	function __construct($host = 'localhost', $dbname = 'projetoWeb', $user = 'root', $password = '')
	{
		$this->host = $host;
		$this->dbname = $dbname;
		$this->user = $user;
		$this->password = $password;
	}

	public function criarConexao()
	{
		$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8";
		$user = $this->user;
		$passwd = $this->password;

		return new PDO($dsn, $user, $passwd);
	}
}
