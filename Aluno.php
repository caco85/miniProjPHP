<?php 
class Aluno
{	
	private $alunoID;
	private $nome;
	private $dataNasc;
	
	function __construct($id, $n, $dataN)
	{
		$this->alunoID = $id;
		$this->nome = $n;
		$this->dataNasc = $dataN;
		
	}
	private function setalunoID($id)
	{
		$this->alunoID = $id;
	}
	private function getalunoID()
	{
		return $this->alunoID;
	}
	private function setNome($n)
	{
		$this->nome = $n;
	}
	private function getNome()
	{
		return $this->nome;
	}
	
	private function setDataNasc($dn)
	{
		$this->dataNasc = $dn;
	}
	private function getDataNasc()
	{
		return $this->dataNasc;
	}
}

?>