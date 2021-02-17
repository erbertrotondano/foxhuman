<?php
include_once '../functions.php'; 
session_start();
$items 			= $_SESSION['items'];
$status_list	= [];
$car_id 		= initiateShoppingCar($CONNECTION);
foreach ($items as $id => $qntity) {
	$params = [
		'product_id' 		=> $id,
		'amount'			=> $qntity,
		'shopping_car_id'	=> $car_id
	];

	$result = sellProduct($params, $CONNECTION);
	array_push($status_list, $result);
}

$title = 'Mercado Genérico - Seu carrinho';
getHeader();
?>
	<div class="d-flex justify-content-between">
		<?php 
			$is_there_any_error = false;
			$error_counter 		= 0;
			foreach ($status_list as $status) {
				if($status['id'] != '200'){
					$is_there_any_error = true;
					$error_counter++;
				}
			}
		?>
		<h3>Resultado da compra</h3>		
	</div>
	<div  class="col-md-12 pt-3">
		<div class="row">
		<?php if(!$is_there_any_error){ ?>
			Não teve nenhum erro
		<?php } else { ?>
			<ul class="list-group w-100">
			<?php 
				foreach ($status_list as $status) { 
					if ($status['id'] != '200') { ?>
						<li class="list-group-item bg-warning">
							<?php echo $status['message']; ?>
						</li>
					<?php } ?>
				<?php }
				if($error_counter < sizeof($status_list)){ ?>
						<li class="list-group-item bg-success">
							Todos os demais itens foram vendidos
						</li>
					<?php } ?>
			</ul>
		<?php } ?>
		</div>
		<div class="row mt-2">
			<a href="../comprar" class="btn btn-block btn-primary">Voltar</a>
		</div>
	</div>
	


<?php function scripts(){ ?>
<?php } ?>
<?php getFooter(); ?>





