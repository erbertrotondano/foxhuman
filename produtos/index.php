<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Listagem de Produtos';
getHeader();
?>
	<div class="d-flex justify-content-between">
		<a href="../dashboard" type="button" class="btn btn-danger">Voltar</a>
		<h3>Produtos</h3>		
		<a href="novo.php" type="button" class="btn btn-primary">Novo</a>
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<ul class="list-group w-100">
			<?php 
			$products = getAllProducts($CONNECTION); 
			foreach($products as $product){ ?>
				<a href="details.php?id=<?php echo $product['id'] ?>">
				<li class="list-group-item">
					<?php echo $product['product_name']; ?>	
					<div class="float-right">
						<a href="excluir.php?id=<?php echo $product['id'] ?>" class="badge badge-danger">X</a>
					</div>
				</li>
				</a>
			<?php } ?>
			</ul>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
