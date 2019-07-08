<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/categorias.php";

$id = $_POST['idcategoria'];

$obj = new categorias();

echo $obj->excluirCategoria($id);

?>