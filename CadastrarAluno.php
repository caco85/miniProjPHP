<?php 
require_once'AlunoController.php';
$alunoController = new AlunoController("db_projetounu","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<div class="container">
		<head>
			<meta charset="utf-8">
			<title>Cadastrar Aluno</title>
			<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
			<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>	
		</head>
		<body>
<?php
		
			if (isset($_POST['nome'])) 
			{
				$nome = addslashes($_POST['nome']);
				$dataNasc = addslashes($_POST['dataNasc']);

				$data = $alunoController->dateConvert($dataNasc);
				var_dump($data);
				
				if (!empty($nome) && !empty($data))
				{
					$alunoController->cadastrarAluno($nome, $data);
				}
				else
				{
?>
					<h4>Preencha todos os campos!</h4>
<?php
				}
			}
?>
	 <?php 
			if (isset($_GET['id']))
			{
				$alunoID = addslashes($_GET['id']);
				$alunoController->excluirAluno($alunoID);	
				//header("location: cadastraraluno.php");
			}	
	?>
			<form method="POST" >
				<div class="form-group row" >
					<label for="nome" class="col-sm-1 col-form-label">Nome</label>
					<div class="col-sm-6">					
						<input type="text" class="form-control" name="nome" id="nome" placeholder="EX: João">
					</div>
				</div>
				<div class="form-group row">
					<label for="dataNasc" class="col-sm-1 col-form-label">Data Nascimento</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="dataNasc" id="dataNasc" placeholder="EX:15122019">
					</div>
				</div>
				<div class="form-group" >
					 <button type="submit" class="btn btn-primary">CADASTRAR</button>
					 <a class="btn btn-info" href="?p=meucadastro">Volta</a>
				</div>
			</form>
			<div>
				<table class="table table-striped">
					<tr >
						<td scope="col">AlunoID</td>
						<td scope="col">Nome</td>
						<td scope="col" colspan="2">Data de Nascimento</td>
					</tr>
			<?php
					$dados = $alunoController->buscarAlunos();
				
					if (count($dados) > 0)
					{
						for ($i=0; $i < count($dados); $i++ ) 
							{ 
								echo "<tr>";
								foreach ($dados[$i] as $key => $value)
								{
									echo "<td>".$value."</td>";
								}
			?>
									<td>
										<a class="btn btn-info" href="alunoeditar.php?id_up=<?php echo $dados[$i]['alunoID'];?>">Editar</a>
										<a class="btn btn-danger" href="cadastraraluno.php?id=<?php echo $dados[$i]['alunoID'];?>">Excluir</a>
									</td>
			<?php 	
								echo "</tr>";
							}	
					}
					else
					{
			?>
					 	<h4>Sem Alunos cadastrados!</h4>
			<?php
					}
				//var_dump($dados); 
			?>			
				</table>	
			</div>
		</body>
	</div>	
</html>