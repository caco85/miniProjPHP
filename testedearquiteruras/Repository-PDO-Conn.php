<?php
try {
	$connPDO = new PDO("mysql:dbname=db_projetounu;host=localhost","root","");
	
} catch (PDOException $e) {
	echo "Erro ao comunicar com o banco de dados: ".$e->getMessage();
}
 catch (Exception $e) {
	echo "Erro generico".$e->getMessage();
}
//-----------Inserir-------------
/*$result = $connPDO->prepare("INSERT INTO tb_alunos(nome, dataNascimento) VALUES (:n, :dN)");
$result->bindValue(":n","Clistenes");
$result->bindValue(":dN","1985-10-13");
$result->execute();

$connPDO->query("INSERT INTO tb_usuarios(nome, usename, email, senha) VALUES ('Renato','caco','caco@hotmail.com','12345')");*/

//--------------------Delete----------------
/*$cmd = $connPDO->prepare("DELETE FROM tb_alunos WHERE alunoID = :id");
$id = 2;
$cmd->bindValue(":id",$id);
$cmd->execute();

$result = $connPDO->query("DELETE FROM tb_usuarios WHERE useID = '2'");
*/
//---------------UPDATE---------------
/*$cmd = $connPDO->prepare("UPDATE tb_alunos SET nome = :n WHERE alunoID = :id");
$cmd->bindValue(":n","Renato Nunes");
$cmd->bindValue(":id",1);
$cmd->execute();
$result = $connPDO->query("UPDATE tb_usuarios SET usename = 'caco85' WHERE useID = '1'");
*/
//------------Select----------
$cmd = $connPDO->prepare("SELECT * FROM tb_alunos WHERE alunoID = :id");
$cmd->bindValue(":id",1);
$cmd->execute();
$result = $cmd->fetch(PDO::FETCH_ASSOC);
//print_r($result);

foreach ($result as $key => $value) {
	echo $key.":".$value." ";
}

/*$res = $connPDO->prepare("SELECT * FROM tb_usuarios");
$res->execute();
$cmd = $res->fetchall();
print_r($cmd);*/





?>