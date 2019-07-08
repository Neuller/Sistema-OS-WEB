<?php 

session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/usuarios.php";

$obj = new usuarios();

$dados = array(
$_POST['usuario'],
$_POST['senha']
);

echo $obj-> login($dados);

 ?>