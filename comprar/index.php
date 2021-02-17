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
			<form class="form-group w-100" action="buy.php" method="POST">
				<ul class="list-group w-100 mb-3">
				<?php 
				$products = getAllProducts($CONNECTION); 
				foreach($products as $product){ ?>
					
					<li class="list-group-item">
						<?php echo $product['product_name']; ?>	
						<div class="float-right">
							<input class="form-control" type="number" name="amount['<?php echo $product["id"] ?>']	" value="0" />
						</div>
					</li>

				<?php } ?>
				</ul>
				<button class="btn btn-lg btn-block btn-success" type="submit" >Fechar carrinho</button>

			</form>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
