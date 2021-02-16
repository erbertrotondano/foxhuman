<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Nova Categoria';
getHeader();
?>
	<div class="row">
		<div class="col-md-6">
			<h3>Cadastrar nova categoria de produto</h3>
		</div>
		
	</div>
	<?php 
	$cat_id 				= $_GET['id'];
	$category 				= findCategory($cat_id, $CONNECTION)[0];
	$cat_tax_id 			= findTaxByCategory($cat_id, $CONNECTION)[0]['tax_id'];
	$category['tax_name'] 	= findTax($cat_tax_id, $CONNECTION)[0]['tax_name'];

	?>
	<div class="col-md-12 pt-3">
		<form class="form" action="store.php" method="POST">
		  <div class="form-group">
		    <label for="product_name">Nome da Categoria</label>
		    <input type="text" class="form-control" id="product_name" name="category_name" value="<?php echo $category['category_name'] ?>" placeholder="Insira o nome: " disabled>
		  </div>
		  <div class="form-group">
		    <label for="tax">Imposto: </label>
		    <input type="text" class="form-control" id="product_name" name="category_name" value="<?php echo $category['tax_name'] ?>" placeholder="" disabled>
		  </div>
		</form>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
