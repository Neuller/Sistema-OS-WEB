<?php 

session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/clientes.php";


$idusuario = $_SESSION['IDUser'];


$obj = new clientes();

//$senha = sha1($_POST['senha']);

$dados = array(
$idusuario,
$_POST['nome'],	
$_POST['sobrenome'],	
$_POST['endereco'],	
$_POST['telefone'],	
$_POST['celular'],	
$_POST['email']	
//$senha
);

echo $obj-> adicionarCliente($dados);

 ?>