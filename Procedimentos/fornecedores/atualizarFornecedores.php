<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/fornecedores.php";


$obj = new fornecedores();



$dados = array(
$_POST['idfornecedorU'],
$_POST['razaosocialU'],
$_POST['enderecoU'],
$_POST['emailU'],
$_POST['telefoneU'],
$_POST['cnpjU']

);

echo $obj-> editarFornecedor($dados);

 ?>