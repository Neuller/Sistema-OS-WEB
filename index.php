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
<link rel="icon" href="img/Icon.png">


  <!-- REFERÊNCIAS -->
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="lib/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="lib/select2/css/select2.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script src="lib/jquery-3.2.1.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.js"></script>
<script src="lib/alertifyjs/alertify.js"></script>
<script src="lib/select2/js/select2.js"></script>
<script src="js/funcoes.js"></script>

  <!-- FIM DAS REFERÊNCIAS -->

<head>
	<title>Nserv Informática</title>
</head>

<body class="Personalizado">
<!-- CABEÇALHO -->
<header class="cabecalho bgGray">
	<a href="index.php" class="logo"></a>
	<button class="btMenu bgGradient"><i class="fas fa-bars"></i></button>

	<nav class="menu">

		<a href="" class="btClose"><i class="far fa-times-circle"></i></a>

		<ul>
			<li><a href="index.php">Início</li></a>
			<li><a href="Views/Sobre.php">Sobre</li></a>
			<li><a href="Views/login.php">Área Restrita</li></a>
		</ul>

	</nav>
</header>
<!-- FIM DO CABEÇALHO -->
	
<!-- INÍCIO DO CAROUSEL -->
<div class="Banner Estilo">
<div class="container">
	<div id="meuCarousel" class="carousel slide" data-ride="carousel">
		<!-- INDICADORES -->
		<ol class="carousel-indicators">
			<li data-target="#meuCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#meuCarousel" data-slide-to="1"></li>
			<li data-target="#meuCarousel" data-slide-to="2"></li>
		</ol>
		<!-- FIM DOS INDICADORES -->

		<!-- SLIDES -->
		<div class="carousel-inner">
			<div class="item active">
				<a href="Views/Sobre.php"><img src="img/carousel/Imagem1.jpg" alt="Banner Nserv" title="NSERV INFO"></a>
				<div class="carousel-caption">
					<h3 class="textCarousel">NSERV - SOLUÇÕES EM TI.</h3>
				</div>
			</div>

			<div class="item">
				<img src="img/carousel/Imagem2.jpg" alt="Banner Nserv" title="PROMOÇÕES OUTLET">
			</div>

			<div class="item">
				<a href="Views/Websites.php"><img src="img/carousel/3.jpg" alt="Banner Nserv" title="WEBSITES"></a>
				<div class="carousel-caption">
					<h3 class="textCarousel">CRIAÇÃO DE WEBSITES RESPONSIVOS</h3>
				</div>
			</div>

		</div>
		<!-- FIM DOS SLIDES -->

		<!-- CONTROLADORES -->
		<a href="#meuCarousel" class="left carousel-control" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Anterior</span>
		</a>

		<a href="#meuCarousel" class="right carousel-control" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Próximo</span>
		</a>
		<!-- FIM DOS CONTROLADORES -->

	</div>
</div>
</div>
<!-- FIM DO CAROUSEL -->

<!-- CONTEÚDO -->
<main class="Estilo bgGray">

	<article class="conteudo bgWhite">

<section class="box">

		<img class="img-thumbnail img-responsive" class="center-block" src="img/principal/desenvolvimento.jpg">

		<div class="text-center">
			<h3><strong>DESENVOLVIMENTO</strong></h3>
		</div>
		<div class="text-left">
			<p class="h5 text-center">Planejamento, Criação e Desenvolvimento de Soluções WEB para o seu Negócio...</p>
		</div>

</section>

<br>

<section class="box">

		<img class="img-thumbnail img-responsive" class="center-block" src="img/principal/CFTV.jpg">

		<div class="text-center">
			<h3><strong>SISTEMAS CFTV</strong></h3>
		</div>
		<div class="text-left">
			<p class="h5 text-center">Você já ouviu falar que prevenir é melhor que remediar? Quando tratamos de segurança patrimonial, essa regra é indispensável. Por isso, o Sistema de CFTV (Circuito Fechado de Televisão) é um aliado tão importante no seu projeto de proteção...</p>
		</div>

</section>

<br>

<section class="box">

		<img class="img-thumbnail img-responsive" class="center-block" src="img/principal/manu.jpg">

		<div class="text-center">
			<h3><strong>ASSISTÊNCIA TÉCNICA</strong></h3>
		</div>
		<div class="text-left">
			<p class="h5 text-center">Montagem e Manutenção de Computadores, Notebooks e Impressoras...</p>
		</div>

</section>

	</article>

</main>
<!-- FIM DO CONTEÚDO -->

<!-- ATENDIMENTO -->
<div class="Estilo">	

	<div class="text-center Opacidade">
			<h3><strong>ATENDIMENTO</strong></h3>
	</div>
<br>

<article class="ConteudoAtendimento">

<section class="BoxAtendimento">
		<i class="fas fa-phone fa-4x"></i>
		<div class="text-center">
        <p class="h5">(31) 3043-4397</p>
        </div>
</section>

<section class="BoxAtendimento">
		<i class="fab fa-whatsapp fa-4x"></i>
		<div class="text-center">
        <p class="h5">(31) 9 9165-4448</p>
        </div>
</section>

<section class="BoxAtendimento">
		<i class="fas fa-envelope fa-4x"></i>
		<div class="text-center">
        <p class="h5">Nserv@hotmail.com</p>
        </div>
</section>

<section class="BoxAtendimento">
		<i class="fas fa-home fa-4x"></i>
		<div class="text-center">
        <p class="h5">Rua Cel. João Camargos - 255 - LOJA01 Contagem - Minas Gerais - 32040-620</p>
        </div>
</section>

</article>

</div>
<!-- FIM DO ATENDIMENTO -->

<!-- RODAPE -->
<footer class="rodape bgGradient"> <!-- navbar-fixed-bottom, ELEMENTO FIXO NO RODAPÉ -->
	<p class="direitos">Copyright © Nserv 2019. Todos os direitos reservados.</p>
</footer>
<!-- FIM DO RODAPE -->

</body>

</html>

<script>
	$(".btMenu").click(function(){
		$(".menu").show();
	});

	$(".btClose").click(function(){
		$(".menu").hide();
	});
</script>

