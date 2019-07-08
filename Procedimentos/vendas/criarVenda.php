<?php 

	session_start();

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/vendas.php";

	$c= new conectar();
	$obj= new vendas();

	if(count($_SESSION['tabelaVendasTemp'])==0){
		echo 0;
	}else{
		$result=$obj->criarVenda();
		unset($_SESSION['tabelaVendasTemp']);
		echo $result;
	}
	
 ?>