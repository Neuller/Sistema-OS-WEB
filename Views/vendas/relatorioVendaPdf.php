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
	AND ve.ID_Venda='$idvenda'";

$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	$comp=$ver[0];
	$data=$ver[2];
	$idcliente=$ver[1];

 ?>	

 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 
 		<img src="../../img/Inicio.jpg" width="200" height="120">
 		<br>
 		<table class="table">
 			<tr>
 				<td>Data: 
 				<?php echo date("d/m/Y", strtotime($data)) ?>
 				</td>
 			</tr>
 			<tr>
 				<td>Código: <?php echo $comp ?></td>
 			</tr>
 			<tr>
 				<td>Cliente: <?php echo $objv->nomeCliente($idcliente); ?></td>
 			</tr>
 		</table>


 		<table class="table">
 			<tr>
 				<td>Produto</td>
 				<td>Preco</td>
 				<td>Descricao</td>
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
			while($mostrar=mysqli_fetch_row($result)):
 			 ?>

 			<tr>
 				<td><?php echo $mostrar[3]; ?></td>
 				<td><?php echo "R$ ".$mostrar[5].",00"; ?></td>
 				<td><?php echo $mostrar[4]; ?></td>
 			</tr>
 			<?php 
 				$total=$total + $mostrar[5];
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total: <?php echo "R$ ".$total.",00"; ?></td>
 			 </tr>
 		</table>
