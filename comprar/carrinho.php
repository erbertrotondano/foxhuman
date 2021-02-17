<?php
include_once '../functions.php'; 

$items = $_POST['items'];
foreach($items as $key => $value){
	if($value == 0){
		unset($items[$key]);
	}
}
session_start();
$_SESSION['items'] 	= $items;
$title = 'Mercado Genérico - Seu carrinho';
getHeader();
?>
	<div class="d-flex justify-content-between">
		<h3>Seu carrinho de compras</h3>		
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
			<ul class="list-group w-100">
				<li class="list-group-item">
					<div class="row">
						<div class="col-md-3 text-secondary small">
							Produto
						</div>
						<div class="col-md-2 text-secondary small">
							Vl Unt
						</div>
						<div class="col-md-1 text-secondary small">
							Qnt.
						</div>
						<div class="col-md-2 text-secondary small">
							Imposto
						</div>
						<div class="col-md-2 text-secondary small">
							Vl. Imposto
						</div>

						<div class="col-md-2 text-secondary small">
							Subtotal
						</div>
					</div>
				</li>
			<?php 
			$product_categories = getAllProductCategories($CONNECTION); 
			$total = 0;
			$total_taxes = 0;
			foreach ($items as $id => $qntity) {
				$product = findProduct($id, $CONNECTION)[0]; 
				if($qntity > 0 && $qntity < $product['amount']){
					$tax = getProductCategoryTax($product, $CONNECTION);
					
					$mult_result 	= ($qntity * $product['unit_cost']);
					$subtotal 		= ((100+$tax['tax_value']) * $mult_result) / 100;
					$vl_tax 		= $subtotal - $mult_result;
					$total_taxes 	+= $vl_tax; 
					$total 			+= $subtotal;
			?>
				<li class="list-group-item">
					<div class="row">
						<div class="col-md-3">
							<?php echo $product['product_name']; ?>	
						</div>
						<div class="col-md-2">
							R$ <?php echo $product['unit_cost']; ?>
						</div>
						<div class="col-md-1">
							<?php echo $qntity; ?>
						</div>
						<div class="col-md-2">
							<?php echo $tax['tax_name'] ?>
						</div>
						<div class="col-md-2">
							R$ <?php echo format_coin($vl_tax) ?>
						</div>
						<div class="col-md-2">
							R$ <?php echo format_coin($subtotal); ?>
						</div>
					</div>
				</li>	
			<?php 
					}
				} 
				?>
				<li class="list-group-item bg-secondary text-white">
					<div class="row d-flex justify-content-center">
						<div class="col-md-4">
							Subtotal Impostos: R$ <?php echo format_coin($total_taxes); ?>
						</div>
						<div class="col-md-4">
							Total: R$ <?php echo format_coin($total); ?>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="row mt-4">
			<div class="col-md-6">
				<a href="../comprar" class="btn btn-danger btn-block">Cancelar compra</a>
			</div>
			<div class="col-md-6">
				<a href="close-car.php" class="btn btn-success btn-block">Fechar Pedido</a>
			</div>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>



