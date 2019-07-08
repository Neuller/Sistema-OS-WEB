<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/clientes.php";


$obj = new clientes();

$dados = array(
$_POST['idclienteU'],
$_POST['nomeU'],
$_POST['sobrenomeU'],
$_POST['enderecoU'],
$_POST['telefoneU'],
$_POST['celularU'],
$_POST['emailU']

);

echo $obj-> editarCliente($dados);

 ?>