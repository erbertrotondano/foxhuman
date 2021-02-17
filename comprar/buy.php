<?php
include_once '../functions.php'; 

// CHAVEAR O ARRAY COM OS NOMES DO PRODUTOS / OU OS IDS
$amount = $_POST['amount'];

$product = findProduct(2, $CONNECTION)[0];

$car_id = initiateShoppingCar($CONNECTION);
foreach ($amount as $id => $qntity) {
	$params = [
		'product_id' 		=> $id,
		'amount'			=> $qntity,
		'shopping_car_id'	=> $car_id
	];

	$result = sellProduct($params, $CONNECTION);
	echo $result['message'];
}


?>
