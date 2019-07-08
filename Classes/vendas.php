<?php 

class vendas{

	public function obterDadosProduto($idproduto){

		$c= new conectar();
		$conexao=$c->conexao();

		$sql="SELECT pro.Nome, pro.Descricao, pro.Quantidade, img.URL, pro.Preco FROM produtos AS pro INNER JOIN imagens AS img ON pro.ID_Imagem=img.ID_Imagem AND pro.ID_Produto='$idproduto'";

		$result=mysqli_query($conexao,$sql);

		$mostrar=mysqli_fetch_row($result);

		$d=explode('/', $mostrar[3]);

		$img=$d[1].'/'.$d[2].'/'.$d[3];

		$dados=array(

			'nome' => $mostrar[0],
			'descricao' => $mostrar[1],
			'quantidade' => $mostrar[2],
			'url' => $img,
			'preco' => $mostrar[4]
		);		

		return $dados;
	}

	public function criarVenda(){

		$c= new conectar();
		$conexao=$c->conexao();

		$data=date('Y-m-d');

		$idvenda=self::criarComprovante();

		$dados=$_SESSION['tabelaVendasTemp'];
		$idusuario=$_SESSION['IDUser'];

		$r=0;

		for ($i=0; $i < count($dados) ; $i++) { 
			$d=explode("||", $dados[$i]);

			$sql="INSERT INTO vendas (ID_Venda,
										ID_Cliente,
										ID_Produto,
										ID,
										Preco,
										DataVenda)
							VALUES ('$idvenda',
									'$d[5]',
									'$d[0]',
									'$idusuario',
									'$d[3]',
									'$data')";

			$r=$r + $result=mysqli_query($conexao,$sql);

		}

		return $r;
	}

	public function criarComprovante(){

		$c= new conectar();
		$conexao=$c->conexao();

		$sql="SELECT ID_Venda FROM vendas GROUP BY ID_Venda DESC";

		$resul=mysqli_query($conexao,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}

	}

	public function nomeCliente($idCliente){

		$c= new conectar();
		$conexao=$c->conexao();


		 $sql="SELECT Nome, Sobrenome FROM clientes WHERE ID_Cliente='$idCliente'";

		$result=mysqli_query($conexao,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function obterTotal($idvenda){

		$c= new conectar();
		$conexao=$c->conexao();


		$sql="SELECT Preco FROM vendas WHERE ID_Venda='$idvenda'";
		$result=mysqli_query($conexao,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}
}

?>