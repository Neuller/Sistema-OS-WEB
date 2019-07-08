<?php 

class fornecedores{

public function adicionarFornecedor($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into fornecedores (ID_Usuario, RazaoSocial, Endereco, Email, Telefone, CNPJ) VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', '$dados[5]')";

	return mysqli_query($conexao, $sql);

}

public function obterDadosFornecedor($idfornecedor){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Fornecedor, RazaoSocial, Endereco, Email, Telefone, CNPJ FROM fornecedores WHERE ID_Fornecedor = '$idfornecedor' ";

	$result = mysqli_query($conexao, $sql);

	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'ID_Fornecedor' => $mostrar[0],
		'RazaoSocial' => $mostrar[1],
		'Endereco' => $mostrar[2],
		'Email' => $mostrar[3],
		'Telefone' => $mostrar[4],
		'CNPJ' => $mostrar[5]
	);

	return $dados;

	}

public function editarFornecedor($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE fornecedores SET RazaoSocial = '$dados[1]', Endereco = '$dados[2]', Email = '$dados[3]', Telefone = '$dados[4]', CNPJ = '$dados[5]' WHERE ID_Fornecedor = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}

public function excluirFornecedor($idfornecedor){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from fornecedores WHERE ID_Fornecedor = '$idfornecedor' ";

	return mysqli_query($conexao, $sql);
}

}

?>