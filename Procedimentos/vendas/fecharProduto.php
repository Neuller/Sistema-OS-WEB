<?php 

	session_start();

	$index=$_POST['ind'];

	unset($_SESSION['tabelaVendasTemp'][$index]);
	
	$dados=array_values($_SESSION['tabelaVendasTemp']);
	unset($_SESSION['tabelaVendasTemp']);
	$_SESSION['tabelaVendasTemp']=$dados;

 ?>