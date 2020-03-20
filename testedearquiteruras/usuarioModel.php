<?php 

Class Usuario{

	private $connPDO;
	public function __construct($dbname, $host, $user, $senha)
	{	
		try {
			$this ->connPDO  = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
		} catch (PDOException $e) {
			echo "Erro ao conectar com o banco".$e->getMessage();
			exit();
		} catch (Exception $e) {
			echo "Erro geral".$e->getMessage();
			exit();			
		}
	}
	public function buscarDados()
	{
		$result = array();
		$cmd = $this->connPDO->query("SELECT * FROM tb_usuarios ORDER BY nome");
		$result = $cmd->fetchAll(PDO::FETCH_ASSOC); 
		return $result;
	}
	public function cadastrarUsuario($nome, $usename, $email, $senha){
		$cmd = $this->connPDO->prepare("SELECT useID from tb_usuarios WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();
		if ($cmd->rowCount() > 0) {
			return false;
		}
		else
		{
			/*$cmd = $this->connPDO->prepare("INSERT INTO tb_usuarios(nome, usename, email, senha) VALUES(:n, :un, e:, :s)");
			$cmd->bindValue(":n",$nome);
			$cmd->bindValue(":un",$usename);
			$cmd->bindValue(":e",$email);
			$cmd->bindValue(":s",$senha);
			$cmd->execute();*/

			$cmd = $this->connPDO->query("INSERT INTO tb_usuarios(nome, usename, email, senha) VALUES('$nome', '$usename', '$email', '$senha')");
			return true;
		}
	}
	public function excluirUsuario($id)
	{
		$cmd = $this->connPDO->prepare("DELETE FROM tb_usuarios WHERE useID = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();	
	}
	public function buscarDadosUse($id){
		$result = array();
		$cmd = $this->connPDO->prepare("SELECT * FROM tb_usuarios WHERE useID = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		$result = $cmd->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	public function atualizarUsuario($useID, $nome, $usename, $email, $senha)
	{	
		$cmd = $this->connPDO->prepare("UPDATE tb_usuarios SET nome = :n, usename = :un, email = :e, senha = :s WHERE useID = :id");
		$cmd->bindValue(":n",$nome);
		$cmd->bindValue(":un",$usename);
		$cmd->bindValue(":e",$email);
		$cmd->bindValue(":s",$senha);
		$cmd->bindValue(":id",$useID);
		$cmd->execute();

	}
}
?>