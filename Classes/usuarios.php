<?php 

class usuarios{

public function registroUsuarios($dados){
	
	$c = new conectar();
	$conexao = $c->conexao();

	$data = date('Y-m-d');

	$sql = "INSERT into usuarios (usuario, nome, email, senha, dataCadastro) VALUES ('$dados[0]','$dados[1]', '$dados[2]', '$dados[3]', '$data')";

	return mysqli_query($conexao, $sql);

}

public function login($dados){

	$c = new conectar();
	$conexao = $c->conexao();

	$senha = sha1($dados[1]);

	$_SESSION['User'] = $dados[0];
	$_SESSION['IDUser'] = self::trazerID($dados);

	$sql = "SELECT * from usuarios WHERE usuario = '$dados[0]' and senha = '$senha' ";

	$result = mysqli_query($conexao, $sql);

	if (mysqli_num_rows($result) > 0){
		return 1;
	}else{
		return 0;
	}

}

public function trazerID($dados){

	$c = new conectar();
	$conexao = $c->conexao();

	$senha = sha1($dados[1]);

	$sql = "SELECT ID from usuarios WHERE usuario = '$dados[0]' and senha = '$senha' ";

	$result = mysqli_query($conexao, $sql);

	return mysqli_fetch_row($result)[0];

}

public function obterDados($idusuario){

			$c = new conectar();

			$conexao=$c->conexao();

			$sql="SELECT ID, usuario, nome, email FROM usuarios WHERE ID='$idusuario'";

			$result=mysqli_query($conexao,$sql);

			$mostrar=mysqli_fetch_row($result);

			$dados=array(

				'ID' => $mostrar[0],
				'usuario' => $mostrar[1],
				'nome' => $mostrar[2],
				'email' => $mostrar[3]
			);

			return $dados;

		}

		public function atualizar($dados){

			$c = new conectar();
			$conexao=$c->conexao();

			$sql=" UPDATE usuarios SET usuario ='$dados[1]', nome ='$dados[2]', email ='$dados[3]' WHERE ID ='$dados[0]' ";

			return mysqli_query($conexao,$sql);	

		}

		public function excluir($idusuario){

			$c = new conectar();
			$conexao=$c->conexao();

			$sql="DELETE FROM usuarios WHERE ID='$idusuario'";

			return mysqli_query($conexao,$sql);
		}


	}

 ?>
