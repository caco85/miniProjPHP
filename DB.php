<?php 

class DB
{
	private $connPDO;
	function __construct($dbname, $host, $user, $senha)
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
}
?>