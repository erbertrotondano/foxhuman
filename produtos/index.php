<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Listagem de Produtos';
getHeader();
?>
	<div class="row">
		<div class="col-md-3">
			<h3>Produtos</h3>
		</div>
		
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<ul class="list-group w-100">
			<?php 
			$products = getAllProducts($CONNECTION); 
			foreach($products as $product){ ?>
				<li class="list-group-item">
					<?php echo $product['product_name']; ?>	
					<div class="float-right">
						<a href="excluir.php?id=<?php echo $product['id'] ?>" class="badge badge-danger">X</a>
					</div>
				</li>
			<?php } ?>
			</ul>
		</div>
		<div class="row mt-3">
			<a href="novo.php" type="button" class="btn btn-primary btn-lg btn-block">Adicionar novo</a>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
