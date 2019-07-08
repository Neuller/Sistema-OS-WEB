<?php 

	class produtos{

		public function addImagem($dados){

			$c= new conectar();
			$conexao=$c->conexao();

			$data=date('Y-m-d');

			$sql="INSERT INTO imagens (ID_Categoria, Nome, URL, DataUpload) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$data')";

			$result=mysqli_query($conexao,$sql);

			return mysqli_insert_id($conexao);
		}

		public function inserirProduto($dados){

			$c= new conectar();
			$conexao=$c->conexao();

			$data=date('Y-m-d');

			$sql="INSERT INTO produtos (ID_Categoria, ID_Imagem, ID, Nome, Descricao, Quantidade, Preco, DataCadastro) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$data')";

			return mysqli_query($conexao,$sql);

		}

		public function obterDados($idproduto){

			$c= new conectar();
			$conexao=$c->conexao();

			$sql="SELECT ID_Produto, ID_Categoria, Nome, Descricao, Quantidade, Preco FROM produtos WHERE ID_Produto ='$idproduto'";

			$result=mysqli_query($conexao,$sql);
			$mostrar=mysqli_fetch_row($result);

			$dados=array(

					"ID_Produto" => $mostrar[0],
					"ID_Categoria" => $mostrar[1],
					"Nome" => $mostrar[2],
					"Descricao" => $mostrar[3],
					"Quantidade" => $mostrar[4],
					"Preco" => $mostrar[5]

						);

			return $dados;

		}

		public function atualizar($dados){

			$c= new conectar();
			$conexao=$c->conexao();

			$sql="UPDATE produtos SET ID_Categoria ='$dados[1]', Nome ='$dados[2]', Descricao ='$dados[3]', Quantidade ='$dados[4]', Preco ='$dados[5]' WHERE ID_Produto ='$dados[0]'";

			return mysqli_query($conexao,$sql);

		}

		public function excluir($idproduto){

			$c= new conectar();
			$conexao=$c->conexao();

			$idimagem=self::obterIdImg($idproduto);

			$sql="DELETE FROM produtos WHERE ID_Produto ='$idproduto'";

			$result=mysqli_query($conexao,$sql);

			if($result){

				$url=self::obterUrlImagem($idimagem);

				$sql="DELETE FROM imagens WHERE ID_Imagem='$idimagem'";

				$result=mysqli_query($conexao,$sql);

					if($result){
						if(unlink($url)){
							return 1;
						}
					}
			}
		}

		public function obterIdImg($idProduto){

			$c= new conectar();
			$conexao=$c->conexao();

			$sql="SELECT ID_Imagem FROM produtos WHERE ID_Produto ='$idProduto'";

			$result=mysqli_query($conexao,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obterUrlImagem($idImg){

			$c= new conectar();
			$conexao=$c->conexao();

			$sql="SELECT URL FROM imagens WHERE ID_Imagem ='$idImg'";

			$result=mysqli_query($conexao,$sql);

			return mysqli_fetch_row($result)[0];

		}
		
	}

 ?>