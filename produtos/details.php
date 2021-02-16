<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Produto';
getHeader();
?>
	<div class="row">
		<div class="col-md-6">
			<h3>Detalhes do Produto</h3>
		</div>
		
	</div>
	<?php 
	$product_id				= $_GET['id'];
	$product 				= findProduct($product_id, $CONNECTION)[0];
	$category				= findCategory($product['category_id'], $CONNECTION)[0];

	
	?>
	<div class="col-md-12 pt-3">
		<form class="form" action="store.php" method="POST">
		  <div class="form-group">
		    <label for="product_name">Nome do Produto</label>
		    <input type="text" class="form-control" id="product_name" name="category_name" value="<?php echo $product['product_name'] ?>" placeholder="Insira o nome: " disabled>
		  </div>
		  <div class="form-group">
		    <label for="tax">Tipo do produto: </label>
		    <input type="text" class="form-control" id="product_name" name="category_name" value="<?php echo $category['category_name'] ?>" placeholder="" disabled>
		  </div>
		  <div class="form-group">
		    <label for="tax">Custo da Unidade: </label>
		    <input type="text" class="form-control" id="product_name" name="category_name" value="<?php echo $product['unit_cost'] ?>" placeholder="" disabled>
		  </div>
		  <div class="form-group">
		    <label for="tax">Estoque: </label>
		    <input type="text" class="form-control" id="product_name" name="category_name" value="<?php echo $product['amount'] ?>" placeholder="" disabled>
		  </div>
		</form>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
