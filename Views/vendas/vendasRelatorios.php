<?php 

	require_once "../../Classes/Conexao.php";
	require_once "../../Classes/vendas.php";

	$c= new conectar();
	$conexao=$c->conexao();

	$obj= new vendas();

	$sql="SELECT ID_Venda, ID_Cliente, DataVenda 
		  FROM vendas GROUP BY ID_Venda";

	$result=mysqli_query($conexao,$sql); 

	?>


<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption></caption>
				<tr>
					<td>Código</td>
					<td>Data</td>
					<td>Cliente</td>
					<td>Valor Total</td>
					<td>Comprovante</td>

				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo date("d/m/Y", strtotime($ver[2]))?></td>
					<td>
						<?php
							if($obj->nomeCliente($ver[1])==" "){
								echo "Sem Cliente";
							}else{
								echo $obj->nomeCliente($ver[1]);
							}
						 ?>
					</td>
					<td>
						<?php 
							echo "R$ ".$obj->obterTotal($ver[0]). ",00";
						 ?>
					</td>
					<td>
						<a href="../Procedimentos/vendas/criarComprovantePdf.php?idvenda=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-print"></span>
						</a>
					</td>

				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>