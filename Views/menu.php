
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-light  navbar-fixed-top bgGray" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo-menu img-thumbnail" src="../img/Inicio.jpg" alt="" width="200px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="../index.php" style="color: black"><span class="glyphicon glyphicon-home"></span> Início</a>
            </li>

            
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black"><span class="glyphicon glyphicon-ok"></span> Cadastros <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="clientes.php" style="color: black">Clientes</a></li>
              <li><a href="status.php" style="color: black">Status</a></li>
            </ul>
          </li>

<!--  
          <li><a href="vendas.php" style="color: black"><span class="glyphicon glyphicon-usd"></span> Vendas </a>
          </li>
-->

           <li><a href="servicos.php" style="color: black"><span class="glyphicon glyphicon-briefcase"></span> Serviços </a>
          </li>
          
          <li class="dropdown" >
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black"><span class="glyphicon glyphicon-cog"></span> Opções   <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php if($_SESSION['User'] == "admin"): ?>
              <li> <a  href="usuarios.php" style="color: black"><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
            <?php endif; ?>
              <li> <a style="color: red" href="../Procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
  
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->

<!-- /container -->        

</body>

</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo-menu').height(100);

    }
    else {
      $('.logo-menu').height(100);
    }
  }
  );
</script>

