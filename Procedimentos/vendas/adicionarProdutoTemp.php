<?php 

	session_start();

	require_once "../../Classes/Conexao.php";

	$c= new conectar();
	$conexao=$c->conexao();

	$idcliente=$_POST['clienteVenda'];
	$idproduto=$_POST['produtoVenda'];
	$descricao=$_POST['descricaoV'];
	$quantidade=$_POST['quantidadeV'];
	$preco=$_POST['precoV'];

	$sql="SELECT Nome, Sobrenome FROM clientes WHERE ID_Cliente='$idcliente'";

	$result=mysqli_query($conexao,$sql);

	$c=mysqli_fetch_row($result);

	$ncliente=$c[0]." ".$c[1];

	$sql="SELECT Nome FROM produtos WHERE ID_Produto='$idproduto'";

	$result=mysqli_query($conexao,$sql);

	$nomeproduto=mysqli_fetch_row($result)[0];

	$produto=$idproduto."||".
				$nomeproduto."||".
				$descricao."||".
				$preco."||".
				$ncliente."||".
				$idcliente;

	$_SESSION['tabelaVendasTemp'][]=$produto;	

 ?>