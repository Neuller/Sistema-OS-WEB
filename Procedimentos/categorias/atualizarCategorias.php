<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/categorias.php";


$obj = new categorias();



$dados = array(
$_POST['idcategoria'],
$_POST['categoriaU'],

);

echo $obj-> editarCategoria($dados);

 ?>