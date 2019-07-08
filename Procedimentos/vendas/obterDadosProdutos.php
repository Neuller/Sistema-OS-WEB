<?php 
	
	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/vendas.php";

	$obj= new vendas();

	echo json_encode($obj->obterDadosProduto($_POST['idproduto']));

 ?>