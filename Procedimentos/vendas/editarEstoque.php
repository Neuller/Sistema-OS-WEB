<?php 

require_once "../../Classes/Conexao.php";

	$c= new conectar();
	$conexao=$c->conexao();

	$dados=$_POST['dados'];

	$idproduto = $dados[0];
	$quantidade = $dados[3].$dados[4].$dados[5].$dados[6];


	$sqlU = "UPDATE produtos SET Quantidade = '$quantidade' where ID_Produto = '$idproduto' ";

	mysqli_query($conexao,$sqlU);

 ?>