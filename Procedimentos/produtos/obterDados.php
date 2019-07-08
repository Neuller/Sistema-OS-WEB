<?php 
	
	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/produtos.php";

	$obj= new produtos();

	$idpro=$_POST['idpro'];

	echo json_encode($obj->obterDados($idpro));

	?>