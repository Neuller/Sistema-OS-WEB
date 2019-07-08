<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/produtos.php";

	$obj= new produtos();

$dados=array(

		$_POST['idProduto'],
	    $_POST['categoriaSelectU'],
	    $_POST['nomeU'],
	    $_POST['descricaoU'],
	    $_POST['quantidadeU'],
	    $_POST['precoU']
	    
			);

    echo $obj->atualizar($dados);

 ?>