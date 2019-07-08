<?php 

class clientes{

public function adicionarCliente($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into clientes (ID_Usuario, Nome, Sobrenome, Endereco, Telefone, Celular, Email) VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]')";

	return mysqli_query($conexao, $sql);

}

public function obterDadosCliente($idcliente){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Cliente, Nome, Sobrenome, Endereco, Telefone, Celular, Email FROM clientes WHERE ID_Cliente = '$idcliente' ";

	$result = mysqli_query($conexao, $sql);

	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'ID_Cliente' => $mostrar[0],
		'Nome' => $mostrar[1],
		'Sobrenome' => $mostrar[2],
		'Endereco' => $mostrar[3],
		'Telefone' => $mostrar[4],
		'Celular' => $mostrar[5],
		'Email' => $mostrar[6]
	);

	return $dados;

	}

public function editarCliente($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE clientes SET Nome = '$dados[1]', Sobrenome = '$dados[2]', Endereco = '$dados[3]', Telefone = '$dados[4]', Celular = '$dados[5]', Email = '$dados[6]' WHERE ID_Cliente = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}

public function excluirCliente($idcliente){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from clientes WHERE ID_Cliente = '$idcliente' ";

	return mysqli_query($conexao, $sql);
}

}

?>