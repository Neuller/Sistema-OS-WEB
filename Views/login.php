<?php

require_once "../Classes/Conexao.php";
$obj = new conectar();
$conexao = $obj->Conexao();

$sql = "SELECT * from usuarios WHERE usuario = 'admin' ";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if(mysqli_num_rows($result) > 0){
	$validar = 1;
}

?>

<!DOCTYPE html>
<html lang="pt-br" class="Personalizado">

  <!-- PADRÃO -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Nserv - Soluções em TI">
<meta name="keywords" content="TI">
<meta name="robots" content="principal, follow">
<meta name="author" content="Neuller César">

  <!-- ICONE -->
<link rel="icon" href="../img/Icon.png">


  <!-- REFERÊNCIAS -->
<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../lib/select2/css/select2.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script src="../lib/jquery-3.2.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../lib/alertifyjs/alertify.js"></script>
<script src="../lib/select2/js/select2.js"></script>
<script src="../js/funcoes.js"></script>

  <!-- FIM DAS REFERÊNCIAS -->

<head>


    <title>Login</title>

</head>

<body class="Estilo bgGray">
	<div class="container">
		<div class="row bgGray">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Olá! Faça seu Login.</div>
					<div class="panel panel-body">
						<p>
							<img class="radius" src="../img/Login.jpg"  width="100%">
						</p>
						<form id="frmLogin">
							<br>
							<label>Usuário</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<br>
							<label>Senha</label>
							<input type="password" name="senha" id="senha" class="form-control input-sm">
							<br>
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
							<?php if(!$validar): ?>
							<a href="../registrar.php" class="btn btn-danger btn-sm">Registrar</a>

							<?php endif; ?>
							
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vazios=validarFormVazio('frmLogin');

			if(vazios > 0){
				alert("Preencha todos os Campos");
				return false;
			}

		dados=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:dados,
			url:"../Procedimentos/login/login.php",
			success:function(r){

				if(r==1){
					window.location="inicio.php";
				}else{
					alert("Acesso Negado");
				}
			}
		});
	});
	});
</script>