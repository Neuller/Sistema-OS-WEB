<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/usuarios.php";

	$obj= new usuarios;

	echo json_encode($obj->obterDados($_POST['idusuario']));

 ?>