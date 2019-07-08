<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/fornecedores.php";

$id = $_POST['idfornecedor'];

$obj = new fornecedores();

echo $obj->excluirFornecedor($id);

?>