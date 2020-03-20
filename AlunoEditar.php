<?php 
require_once'AlunoController.php';
$alunoController = new AlunoController("db_projetounu","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>	
		<meta charset="utf-8">
		<title>Aluno Cadastro</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
		<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
	</head>
	<body>
	<?php
		if(isset($_GET['id_up']))
		{
			$id = ($_GET['id_up']);
			$result = $alunoController->buscarDadosAluno($id);
			//var_dump($result);
		}
			
	?>
	<?php
		if (isset($_POST['nome'])) 
		{
			$alunoID = addslashes ($_GET['id_up']);
		 	$nome = addslashes($_POST['nome']);
		 	$dataNasc = ($_POST['dataNasc']);
 			
		 	$data = $alunoController->dateConvert($dataNasc);
		 	var_dump($data);
		 	if (!empty($nome) && !empty($data))
		 	{
		 		$alunoController->atualizarAluno($alunoID,$nome,$data); 
		 		header("location: cadastraraluno.php");
			 				 	}
		 	else
		 	{
	?> 
				<h4>Preencha todos os campos!</h4>
	<?php
		 	}

	}		 	
	?>	
		<form method="POST" >
			<div class="form-group row" >
				<label for="nome" class="col-sm-1 col-form-label">Nome</label>
				<div class="col-sm-6">					
					<input type="text" class="form-control" name="nome" id="nome" value="<?php if(isset($result)){echo $result['nome'];}?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="dataNasc" class="col-sm-1 col-form-label">Data Nascimento</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="dataNasc" id="dataNasc" placeholder="EX:15122019" value="<?php if(isset($result)){echo $result['dataNascimento'];}?>">
				</div>
			</div>
			<div>
			<div class="form-group" >
				<button type="submit" class="btn btn-primary">Atualizar</button>
				<a class="btn btn-info" href="?p=cadastraraluno">voltar</a>
			</div>
		</form>	
		
	</body>
</html>