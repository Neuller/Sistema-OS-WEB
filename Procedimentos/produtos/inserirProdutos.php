<?php 

	session_start();

	$idusuario=$_SESSION['IDUser'];

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/produtos.php";

	$obj= new produtos();

	$dados=array();
	
	$nomeImg=$_FILES['imagem']['name'];
	$urlArmazenamento=$_FILES['imagem']['tmp_name'];
	$pasta='../../arquivos/';
	$urlFinal=$pasta.$nomeImg;

	$dadosImg=array(
		$_POST['categoriaSelect'],
		$nomeImg,
		$urlFinal
		);

		if(move_uploaded_file($urlArmazenamento, $urlFinal)){
				$idimagem=$obj->addImagem($dadosImg);

				if($idimagem > 0){

					$dados[0]=$_POST['categoriaSelect'];
					$dados[1]=$idimagem;
					$dados[2]=$idusuario;
					$dados[3]=$_POST['nome'];
					$dados[4]=$_POST['descricao'];
					$dados[5]=$_POST['quantidade'];
					$dados[6]=$_POST['preco'];

					echo $obj->inserirProduto($dados);
					
				}else{
					echo 0;
				}
		}

 ?>