<?php 

require_once "../../Classes/Conexao.php";

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Cliente, Nome, Sobrenome, Endereco, Telefone, Celular, Email FROM clientes";
	$result = mysqli_query($conexao, $sql);

	?>

<table id="tabelaClientes" class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption></caption>
	<tr>
		<td>Nome</td>
		<td>Sobrenome</td>
		<td>Endereço</td>
		<td>Telefone</td>
		<td>Celular</td>
		<td>Email</td>

		<td>Editar</td>
		<td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	

	<tr>

		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td><?php echo $mostrar[4]; ?></td>
		<td><?php echo $mostrar[5]; ?></td>
		<td><?php echo $mostrar[6]; ?></td>

		<td>
			<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="adicionarDado('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-sm" onclick="eliminarCliente('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endWhile; ?>
</table>




