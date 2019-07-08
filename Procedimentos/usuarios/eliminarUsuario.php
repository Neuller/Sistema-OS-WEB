<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/usuarios.php";

	$obj= new usuarios;

	echo $obj->excluir($_POST['idusuario']);

 ?>