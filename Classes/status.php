<?php 

class status{

public function adicionarStatus($dados){

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into status (ID_Usuario, Nome_Status, DataCadastro) VALUES ('$dados[0]','$dados[1]', '$dados[2]')";

	return mysqli_query($conexao, $sql);

}

public function editarStatus($dados){

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE status SET Nome_Status = '$dados[1]' WHERE ID_Status = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);

}

public function excluirStatus($idstatus){

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from status WHERE ID_Status = '$idstatus' ";

	return mysqli_query($conexao, $sql);

}

}

?>