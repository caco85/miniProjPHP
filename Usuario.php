<?php 
class Usuario
{	
	private $useID;
	private $nome;
	private $useName;
	private $email;
	private $senha;
	
	function __construct($useID, $nome, $useName, $email, $senha)
	{
		$this->useID = $useID;
		$this->nome = $nome;
		$this->useName = $useName;
		$this->email = $email;
		$this->senha = $senha;
	}
	private function setUserID($id)
	{
		$this->useID = $id;
	}
	private function getUseID()
	{
		return $this->useID;
	}
	private function setNome($n)
	{
		$this->nome = $n;
	}
	private function getNome()
	{
		return $this->nome;
	}
	private function setUseName($un)
	{
		$this->useName = $un;
	}
	private function getUseName()
	{
		return $this->useName;
	}
	private function setEmail($e)
	{
		$this->email = $e;
	}
	private function getEmail()
	{
		return $this->email;
	}
	private function setSenha($s)
	{
		$this->senha = $s;
	}
	private function getSenha()
	{
		return $this->senha;
	}

}

?>