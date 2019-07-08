
<?php 
	require_once "../../Classes/Conexao.php";

	$c= new conectar();

	$conexao=$c->conexao();

	$sql="SELECT pro.Nome, pro.Descricao, pro.Quantidade, pro.Preco, img.URL, cat.Nome_Categoria, pro.ID_Produto FROM produtos AS pro INNER JOIN imagens AS img ON pro.ID_Imagem=img.ID_Imagem inner JOIN categorias AS cat on pro.ID_Categoria=cat.ID_Categoria";

	$result=mysqli_query($conexao,$sql);
	
 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption></caption>
	<tr>
		<td>Nome</td>
		<td>Descrição</td>
		<td>Quantidade</td>
		<td>Preço</td>
		<td>Imagem</td>
		<td>Categoria</td>
		<td>Editar</td>
		<td>Excluir</td>
	</tr>

	<?php while($mostrar=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[0]; ?></td>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td>R$ <?php echo $mostrar[3]; ?>,00</td>
		<td>
			<?php 
			$imgVer=explode("/", $mostrar[4]) ; 
			$imgurl=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
			?>
			<img width="80" height="80" src="<?php echo $imgurl ?>">
		</td>
		<td><?php echo $mostrar[5]; ?></td>
		<td>

			<span  data-toggle="modal" data-target="#abremodalUpdateProduto" class="btn btn-warning btn-sm" onclick="addDadosProduto('<?php echo $mostrar[6] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-sm" onclick="eliminarProduto('<?php echo $mostrar[6] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>