<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/produtos.php";

	$obj= new produtos();

	$idpro=$_POST['idproduto'];

	echo $obj->excluir($idpro);

?>