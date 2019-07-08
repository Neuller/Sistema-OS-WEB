<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/vendas.php";

	$objv= new vendas();

	$c= new conectar();
	
	$conexao=$c->conexao();
	
	$idvenda=$_GET['idvenda'];

 $sql="SELECT ve.ID_Venda,
 		ve.ID_Cliente,
		ve.DataVenda,
		pro.Nome,
        pro.Descricao,
        pro.Preco
	FROM vendas  AS ve 
	INNER JOIN produtos AS pro
	ON ve.ID_Produto=pro.ID_Produto
	and ve.ID_Venda='$idvenda'";

$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	$comp=$ver[0];
	$data=$ver[2];
	$idcliente=$ver[1];

 ?>	

 	<title>COMPROVANTE DE VENDA</title>

 	<style type="text/css">
		
@page {
            margin-top: 0.3em;
            margin-left: 0.6em;
        }
    body{
    	font-size: xx-small;
    }
	</style>
 	<br>
 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 	<br>
<div class="text-center">
	<img src="../../img/Nserv.png" width="200" height="200">
</div>
 	<br>
<div class="text-center">
 		<p><strong>COMPROVANTE DE VENDA</strong></p>
</div>
 		<p>
 			Data: 
 			<?php echo date("d/m/Y", strtotime($data)) ?>
 		</p>
 		<p>
 			Codigo: <?php echo $comp ?>
 		</p>
 		<p>
 			Cliente: <?php echo $objv->nomeCliente($idcliente); ?>
 		</p>
 		<br>
 		<table class="table table-bordered" style="border-collapse: collapse;" border="1" width="135px">

 			<tr>
 				<td>Nome</td>
 				<td>Preco</td>
 			</tr>
 			
 			<?php 
 				$sql="SELECT ve.ID_Venda,
 						    ve.ID_Cliente,
							ve.DataVenda,
							pro.Nome,
					        pro.Descricao,
					        pro.Preco
						FROM vendas  AS ve 
						INNER JOIN produtos AS pro
						ON ve.ID_Produto=pro.ID_Produto
						AND ve.ID_Venda='$idvenda'";

				$result=mysqli_query($conexao,$sql);
				$total=0;
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>

 			<tr>
 				<td><?php echo $mostrar[3]; ?></td>
 				<td><?php echo "R$ ".$mostrar[5].",00" ?></td>
 			</tr>

 			<?php
 				$total=$total + $mostrar[5];
 				} 
 			 ?>

 			 <tr>
 			 	<td colspan="2">Total: <?php echo "R$ ".$total.",00" ?></td>
 			 </tr>

 		</table>
<br>
 <div class="text-center">
 		<p>"A qualidade e a nossa melhor garantia de fidelidade ao cliente, nossa mais forte defesa contra a concorrencia e o unico caminho para o crescimento e para os lucros. Agradecemos a preferencia!"</p>
</div>
