<?php 

	session_start();
	
 ?>

 <h4><strong><div id="nomeclienteVenda"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<tr>
 		<td>Produto</td>
 		<td>Descrição</td>
 		<td>Preço</td>
 		<td>Quantidade</td>
 		<td>Remover</td>
 	</tr>
 	<?php 
 	$total=0;//total da venda em dinheiro
 	$cliente=""; //nome cliente
 		if(isset($_SESSION['tabelaVendasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tabelaVendasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo "R$ ".$d[3].",00" ?></td>
 		<td><?php echo 1; ?></td>
 		<td>
 			<span class="btn btn-danger btn-sm" onclick="fecharP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[3];
 		$i++;
 		$cliente=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td>Valor Total</td>
 		<td><?php echo "R$ ".$total.",00"; ?></td>
 	</tr>

 </table>

  	<caption>
 		<span class="btn btn-success" onclick="criarVenda()"> Realizar Venda
 		</span>
 	</caption>

 <script type="text/javascript">
 	$(document).ready(function(){
 		Nome="<?php echo @$cliente ?>";
 		$('#nomeclienteVenda').text("Cliente: " + Nome);
 	});
 </script>