<?php 

require_once "../../Classes/Conexao.php";
require_once "../../Classes/usuarios.php";

$obj = new usuarios();
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = sha1($_POST['senha']);

$dados = array(
$_POST['usuario'],
$_POST['nome'],
$_POST['email'],
$senha
);

echo $obj-> registroUsuarios($dados);

 ?>