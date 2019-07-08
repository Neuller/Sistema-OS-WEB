<?php 

require_once "../../Classes/Conexao.php";

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Status, Nome_Status FROM status";

	$result = mysqli_query($conexao, $sql);

	?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption></caption>
	<tr>
		<td>Descrição</td>
		<td>Editar</td>
		<td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	

	<tr>
		<td><?php echo $mostrar[1]; ?></td>
		<td>
			<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#atualizaStatus" onclick="adicionarDado('<?php echo $mostrar[0]; ?>','<?php echo $mostrar[1]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-sm" onclick="eliminarStatus('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endWhile; ?>
</table>