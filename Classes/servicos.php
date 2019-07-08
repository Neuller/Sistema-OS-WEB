<?php 

class servicos{

	public function adicionarServico($dados){

	$c = new conectar();
	$conexao = $c->conexao();

	$data=date('Y-m-d');

	$sql = "INSERT INTO servicos (ID_Cliente, ID, ID_Status, Equipamento, Info, SerialNumber, DataCadastro) VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', '$dados[5]', '$data')";

	return mysqli_query($conexao, $sql);

}

public function obterDadosServicos($idservico){

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Servico, ID_Cliente, ID, ID_Status, Equipamento, Info, Servico, SerialNumber, Garantia, Preco, DataCadastro FROM servicos WHERE ID_Servico = '$idservico' ";

	$result = mysqli_query($conexao, $sql);

	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'ID_Servico' => $mostrar[0],
		'ID_Cliente' => $mostrar[1],
		'ID' => $mostrar[2],
		'ID_Status' => $mostrar[3],
		'Equipamento' => $mostrar[4],
		'Info' => $mostrar[5],
		'Servico' => $mostrar[6],
		'SerialNumber' => $mostrar[7],
		'Garantia' => $mostrar[8],
		'Preco' => $mostrar[9],
		'DataCadastro' => $mostrar[10]
	);

	return $dados;

	}

public function editarServico($dados){

	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE servicos SET ID_Status = '$dados[1]', Servico = '$dados[2]', Garantia = '$dados[3]', Preco = '$dados[4]' WHERE ID_Servico = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}

    public function nomeCliente($idCliente){

		$c= new conectar();
		$conexao=$c->conexao();

		$sql="SELECT Nome, Sobrenome FROM clientes WHERE ID_Cliente='$idCliente'";

		$result=mysqli_query($conexao,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function nomeStatus($idstatus){

		$c= new conectar();
		$conexao=$c->conexao();

		$sql="SELECT Nome_Status FROM status WHERE ID_Status='$idstatus'";

		$result=mysqli_query($conexao,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0];

	}


}

?>