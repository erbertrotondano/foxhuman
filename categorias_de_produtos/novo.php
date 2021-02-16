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
	<div class="col-md-12 pt-3">
		<form class="form" action="store.php" method="POST">
		  <div class="form-group">
		    <label for="product_name">Nome da Categoria</label>
		    <input type="text" class="form-control" id="product_name" name="category_name" placeholder="Insira o nome: ">
		  </div>
		  <div class="form-group">
		  	<div class="row">
			  	<div class="col-md-9">
				    <label for="tax">Escolha o Imposto</label>
				    <select name="tax" id="tax" class="form-control">
				    	<option value="">Selecione</option>
				    	<?php $taxes = getAllTaxes($CONNECTION); 
				    		foreach ($taxes as $tax) { ?>	
		    				<option value="<?php echo $tax['id']; ?>"><?php echo $tax['tax_name'] ?></option>
			    			<?php
				    		}
				    	?>
				    </select>
			    </div>
			    <div class="col-md-3 p-4 mt-2">
			    	<a class="btn btn-success" href="../imposto/novo.php">Cadastrar Imposto</a>
				</div>
			</div>
		  </div>
		  <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar</button>
		</form>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
