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
    <title>Nserv Informática</title>
</head>

<body class="Personalizado">
<!-- CABEÇALHO -->
<header class="cabecalho bgGray">
    <a href="../index.php" class="logo"></a>
    <button class="btMenu bgGradient"><i class="fas fa-bars"></i></button>

    <nav class="menu">

        <a href="" class="btClose"><i class="far fa-times-circle"></i></a>

        <ul>
            <li><a href="../index.php">Início</li></a>
            <li><a href="Sobre.php">Sobre</li></a>
            <li><a href="login.php">Área Restrita</li></a>
        </ul>

    </nav>
</header>
<!-- FIM DO CABEÇALHO -->

<!-- CONTEÚDO -->
<main class="Estilo">

<article class="conteudo bgWhite">

    <section class="boxSobre">

    <img class="img-thumbnail img-responsive" class="center-block" src='../img/Sobre.jpg'>

    </section>

    <section class="boxSobre" style="margin-top:25px;">

    <div class="text-left">

    <p class="h5 text-justify"><strong>NSERV</strong> é uma empresa especializada na área de Tecnologia da Informação, atua no mercado oferecendo soluções e projetos personalizados de acordo com as necessidades dos clientes, independente do porte e ramo de negócio da empresa.
    </p>

    <p class="h5 text-justify">
    A Tecnologia da Informação é hoje a grande aliada das organizações quando o assunto é reduzir custos e otimizar tempo. Por isso a NSERV analisa cuidadosamente o seu ambiente, para identificar as necessidades mais específicas, provendo assim, soluções adequadas ao ambiente de TI para cada cliente, permitindo que seus profissionais se concentrem em seus negócios, enquanto nossos especialistas fornecem todo o suporte e gerenciamento necessários para o sucesso das operações.
    </p>

    </div>

    </section>

</article>

</main>

<!-- INFO.MATRIZ -->
<div class="Estilo bgGray">

    <article class="Conteudo">

        <div class="text-left Opacidade">
            Razão Social - Matriz
        </div>
        <div class="text-left Opacidade">
            Nserv Informática
        </div>
        <div class="text-left Opacidade">
            CNPJ: 28.455.751/0001-11
        </div>
        <div class="text-left Opacidade">
            Rua Cel. João Camargos, Nº 255 - LOJA01
        </div>
        <div class="text-left Opacidade">
            Centro - 32040-620 - Contagem - Minas Gerais
        </div>

    </article>

</div>
<!-- FIM DO INFO.MATRIZ -->

 <!-- RODAPE -->
<footer class="rodapeSobre bgGradient"> <!-- navbar-fixed-bottom, ELEMENTO FIXO NO RODAPÉ -->
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



