<?php 

class categorias{

public function adicionarCategoria($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into categorias (ID_Usuario, Nome_Categoria, DataCadastro) VALUES ('$dados[0]','$dados[1]', '$dados[2]')";

	return mysqli_query($conexao, $sql);

}

public function editarCategoria($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE categorias SET Nome_Categoria = '$dados[1]' WHERE ID_Categoria = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}

public function excluirCategoria($idcategoria){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from categorias WHERE ID_Categoria = '$idcategoria' ";

	return mysqli_query($conexao, $sql);
}

}

?>