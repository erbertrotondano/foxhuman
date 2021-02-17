<?php 
include_once '../functions.php'; 
$title = 'Mercado Genérico - Listagem de Produtos';
getHeader();
?>
	<div class="d-flex justify-content-between">
		<a href="../dashboard" type="button" class="btn btn-danger">Voltar</a>
		<h3>Produtos</h3>		
		<p class="ml-5"></p>
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<form class="form-group w-100" action="carrinho.php" method="POST">
				<ul class="list-group w-100 mb-3">
				<?php 
				$products = getAllProducts($CONNECTION); 
				foreach($products as $product){ ?>
					
					<li class="list-group-item">
						<div class="row pl-5 ml-3">
							<div class="col-md-6">
								<div class="row pb-2">
								<p class="">
									<?php echo $product['product_name']; ?>	
								</p>
								</div>
								<div class="row">
								<p class="text-secondary">
									Preço unitário: <?php echo $product['unit_cost'];  ?>
								</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row pb-2">
									<label class="text-secondary pt-1 pr-2">Quantidade: </label>
									<input class="form-control w-50" type="number" name="items['<?php echo $product["id"] ?>']	" value="0" min="0" max="<?php echo $product['amount'] ?>"/>
								</div>
								<div class="row">
									<p class="text-secondary">Estoque atual: <?php echo $product['amount']; ?></p>
								</div>
							</div>
						</div>
					</li>

				<?php } ?>
				</ul>
				<button class="btn btn-lg btn-block btn-success" type="submit" >Visualizar carrinho</button>

			</form>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>
