<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Categiruas de Produtos';
getHeader();
?>
	<div class="d-flex justify-content-between">
		<a href="../dashboard" type="button" class="btn btn-danger">Voltar</a>
		<h3>Tipos de Produtos</h3>		
		<a href="novo.php" type="button" class="btn btn-primary">Novo</a>
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<ul class="list-group w-100">
			<?php 
			$product_categories = getAllProductCategories($CONNECTION); 
			foreach($product_categories as $category){ ?>
				<li class="list-group-item">
					<a href="details.php?id=<?php echo $category['id']; ?>">
						<?php echo $category['category_name']; ?>	
						<div class="float-right">
							<a href="excluir.php?id=<?php echo $category['id'] ?>" class="badge badge-danger">X</a>
						</div>
					</a>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
