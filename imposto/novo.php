<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Novo imposto';
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
			    <label for="tax_name">Nome do Imposto</label>
			    <input type="text" class="form-control" id="tax_name" name="tax_name" placeholder="Insira um identificador que você reconheça depois: ">
			  </div>
			  <div class="form-group">
			    <label for="tax_percentage">Valor Unitário</label>
			    <input type="number" step="0.1" min="0" max="100" class="form-control" id="tax_percentage" name="tax_percentage" placeholder="Insira a porcentagem de imposto sobre o produto">
			  </div>
			  <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
			</form>

	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
