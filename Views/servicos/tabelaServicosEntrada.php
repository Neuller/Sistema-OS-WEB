<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/servicos.php";

	$c= new conectar();

	$conexao=$c->conexao();

	$obj= new servicos();

	$sql="SELECT ID_Servico, ID_Cliente, ID_Status, Equipamento, Info, SerialNumber, Preco, DataCadastro FROM servicos ORDER BY ID_Servico DESC";

	$result=mysqli_query($conexao,$sql);
	
 ?>

<!DOCTYPE html>

<head>

	<meta charset="UTF-8">

</head>

<body>

 <table id="TabelaServicos" class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption></caption>
	<tr>
		<td>Código</td>
		<td>Cliente</td>
		<td>Status</td>
		<td>Número Serial</td>
		<td>Data de Cadastro</td>
		<td>Comprovante Entrada</td>
		<td>Comprovante Saida</td>
		<td>Editar</td>
		<td>Visualizar</td>
	</tr>

	<?php while($mostrar=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[0]; ?></td>
		<td>
						<?php
							if($obj->nomeCliente($mostrar[1])==" "){
								echo "Sem Cliente";
							}else{
								echo $obj->nomeCliente($mostrar[1]);
							}
						 ?>
					</td>
		<td>
			<?php
							if($obj->nomeStatus($mostrar[2])==" "){
								echo "Sem Status";
							}else{
								echo $obj->nomeStatus($mostrar[2]);
							}
						 ?>
		</td>
		<td><?php echo $mostrar[5]; ?></td>
		<td><?php echo date("d/m/Y", strtotime($mostrar[7]))?></td>
		
		<td>
		<a href="../Procedimentos/servicos/criarComprovanteEntradaPdf.php?idserv=<?php echo $mostrar[0] ?>" class="btn btn-danger btn-sm">
		<span class="glyphicon glyphicon-print"></span>
		</a>
		</td>

		<td>
		<a href="../Procedimentos/servicos/criarComprovanteSaidaPdf.php?idserv=<?php echo $mostrar[0] ?>" class="btn btn-danger btn-sm">
		<span class="glyphicon glyphicon-print"></span>
		</a>
		</td>

		<td>
			<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#atualizaServico" onclick="adicionarDadoU('<?php echo $mostrar[0]; ?>','<?php echo $mostrar[1]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>

		<td>
			<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarServico" onclick="visualizaDado('<?php echo $mostrar[0]; ?>','<?php echo $mostrar[1]; ?>')">
				<span class="glyphicon glyphicon-search"></span>
			</span>
		</td>

	</tr>
	
<?php endwhile; ?>

</table>

</body>

</html>
