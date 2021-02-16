<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Novo produto';
getHeader();
?>
	<div class="row">
		<div class="col-md-6">
			<h3>Cadastrar novo Produto</h3>
		</div>
		
	</div>
	<div class="col-md-12 pt-3">

			<form class="form" action="store.php" method="POST">
			  <div class="form-group">
			    <label for="product_name">Nome do Produto</label>
			    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Insira o nome: ">
			  </div>
			  <div class="form-group">
			    <label for="unit_cost">Valor Unitário</label>
			    <input type="number" class="form-control" id="unit_cost" name="unit_cost" placeholder="Insira o valor de cada unidade do produto">
			  </div>
			  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
			</form>

	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
