<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/servicos.php";

	$objv= new servicos();

	$c= new conectar();
	$conexao=$c->conexao();
	
	$idserv=$_GET['idserv'];

 $sql="SELECT serv.ID_Servico,
 		serv.ID_Cliente,
 		serv.ID_Status,
		serv.Equipamento,
		serv.Info,
		serv.Servico,
        serv.SerialNumber,
        serv.Garantia,
        serv.Preco,
        serv.DataCadastro
	FROM servicos AS serv WHERE ID_Servico='$idserv'";

$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	$comp=$ver[0];
	$data=$ver[9];
	$idcliente=$ver[1];
	$idstatus=$ver[2];
	$garantia=$ver[7];
	$valortotal=$ver[8];

 ?>	

 	<title>SAIDA DE EQUIPAMENTO</title>

 	<style type="text/css">
		
@page {

        }
    body{
    	font-size: xx-small;
    }
	</style>

 	<br>
 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="../../css/ComprovantesHTML.css">
 	<br>
<div class="text-center">
	<img src="../../img/Nserv.jpg" width="200" height="200">
</div>
 	<br>

<div class="text-center">
 		<p><strong>SAÍDA DE EQUIPAMENTO</strong></p>
</div>


<div id="Coluna1" class="text-center">

        <p>
 			<strong>Código de Serviço:</strong> <?php echo $comp ?>
 		</p>

        <p>
 			<strong>Cliente:</strong> <?php echo $objv->nomeCliente($idcliente); ?>
 		</p>

        <p>
 			<strong>Status de Serviço:</strong> <?php echo $objv->nomeStatus($idstatus); ?>
 		</p>

</div>

<div id="Coluna2" class="text-center">

	    <p>
 			<strong>Data de Entrada:</strong> <?php echo date("d/m/Y", strtotime($data)) ?>
 		</p>

        <p>
 			<strong>Garantia:</strong> <?php echo $garantia ?> 
 		</p>

        <p>
 			<strong>Valor Total:</strong> <?php echo $valortotal ?>,00
 		</p>

</div>


 		<table class="table table-bordered" style="border-collapse: collapse; margin-top:100px;" border="1" width="135px">

 			<tr class="text-center">
 				<td><strong>EQUIPAMENTO</strong></td>
 				<td><strong>NÚMERO DE SERIAL</strong></td>
 			</tr>

 			<?php 
 				$sql="SELECT serv.ID_Servico,
 		        serv.ID_Cliente,
		        serv.Equipamento,
		        serv.ID_Status,
		        serv.Info,
		        serv.Servico,
                serv.SerialNumber,
                serv.Garantia,
                serv.Preco,
                serv.DataCadastro
	            FROM servicos AS serv WHERE ID_Servico='$idserv'";

				$result=mysqli_query($conexao,$sql);
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>

 			<tr class="text-center">
 				<td><?php echo $mostrar[2]; ?></td>
 				<td><?php echo $mostrar[6]; ?></td>
 			</tr>

 			<<?php } ?>
 			
 		</table>


 		 <table class="table table-bordered" style="border-collapse: collapse; margin-top:20px;" border="1" width="135px">

 			<tr class="text-center">
 				<td><strong>OBSERVAÇÃO</strong></td>
 			</tr>

 			<?php 
 				$sql="SELECT serv.ID_Servico,
 		        serv.ID_Cliente,
		        serv.Equipamento,
		        serv.ID_Status,
		        serv.Info,
		        serv.Servico,
                serv.SerialNumber,
                serv.Garantia,
                serv.Preco,
                serv.DataCadastro
	            FROM servicos AS serv WHERE ID_Servico='$idserv'";

				$result=mysqli_query($conexao,$sql);
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>

 			<tr class="text-center">
 				<td><?php echo $mostrar[4]; ?></td>
 			</tr>

 			<<?php } ?>
 			
 		</table>

 		<table class="table table-bordered" style="border-collapse: collapse;" border="1" width="135x">

 			<tr class="text-center">
 				<td><strong>SERVIÇO EXECUTADO</strong></td>
 			</tr>

 			<?php 
 				$sql="SELECT serv.ID_Servico,
 		        serv.ID_Cliente,
		        serv.Equipamento,
		        serv.ID_Status,
		        serv.Info,
		        serv.Servico,
                serv.SerialNumber,
                serv.Garantia,
                serv.Preco,
                serv.DataCadastro
	            FROM servicos AS serv WHERE ID_Servico='$idserv'";

				$result=mysqli_query($conexao,$sql);
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>

 			<tr class="text-center">
 				<td><?php echo $mostrar[5]; ?></td>
 			</tr>

 			<<?php } ?>
 			
 		</table>

 <div class="text-center" style="margin-top:20px;">

 	<div class="item">

 		<p><strong>CONDIÇÕES DE SERVIÇOS</strong></p>

 		<p>Em caso de ORÇAMENTO para IMPRESSORAS e NOTEBOOKS, será cobrada uma taxa de R$ 25,00 caso o mesmo seja recusado pelo Cliente.</p>

 	</div>

<hr>

    <div class="item">

 		<p>"A qualidade é a nossa melhor garantia de fidelidade ao cliente, nossa mais forte defesa contra a concorrência e o único caminho para o crescimento e para os lucros. Agradecemos a preferência!"</p>

 	</div>

<hr>

 	<div class="item" style="margin-top:20px;">

 		<p>CNPJ: 28.455.751/0001-11 - Rua Cel. João Camargos, Nº 255 - LOJA01 - Centro - 32040-620 - Contagem - MG</p>
 		<p><strong>(31) 3043-4397 - (31) 9 9165-4448</strong></p>

 	</div>

</div>








