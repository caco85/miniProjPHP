<?php 
require_once"Aluno.php";


//$aluno = new Usuario($alunoID, $nome, $dataNasc);

class AlunoController 
{
	
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
	
	public function buscarAlunos()
	{
		
		$result = array();
		$cmd = $this->connPDO->query("SELECT * FROM tb_alunos ORDER BY nome");
		$result = $cmd->fetchAll(PDO::FETCH_ASSOC); 
		return $result;

	}
	public function cadastrarAluno($nome, $dataNasc){
	
			/*$cmd = $this->connPDO->prepare("INSERT INTO tb_usuarios(nome, dataNascimento) VALUES(:n, :un)");
			$cmd->bindValue(":n",$nome);
			$cmd->bindValue(":dn",$dataNasc);
			$cmd->execute();*/
			$cmd = $this->connPDO->query("INSERT INTO tb_alunos(nome, dataNascimento) VALUES('$nome', '$dataNasc')");
			//return true;
		
	}
	
	public function excluirAluno($id)
	{
		$cmd = $this->connPDO->prepare("DELETE FROM tb_alunos WHERE alunoID = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();	
	}

	public function buscarDadosAluno($id){
		$result = array();
		$cmd = $this->connPDO->prepare("SELECT * FROM tb_alunos WHERE alunoID = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		$result = $cmd->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	public function atualizarAluno($alunoID, $nome, $dataNasc)
	{	
		$cmd = $this->connPDO->prepare("UPDATE tb_alunos SET nome = :n, dataNascimento = :dn WHERE alunoID = :id");
		$cmd->bindValue(":n",$nome);
		$cmd->bindValue(":dn",$dataNasc);
		$cmd->bindValue(":id",$alunoID);
		$cmd->execute();
		

	}
	public function dateConvert($date)
	{
	    if ( ! strstr( $date, '/' ) )
	    {
	        
	        sscanf($date, '%d-%d-%d', $y, $m, $d);
	        return sprintf('%02d/%02d/%04d', $d, $m, $y);
	    }
	    
	    {
	        sscanf($date, '%d/%d/%d', $d, $m, $y);
	        return sprintf('%04d-%02d-%02d', $y, $m, $d);
	    }
	 
	    return false;
	}

}

?>