<?php
include_once '../functions.php'; 


// Isset not working properly

if ( isset($_POST['product_name']) && isset($_POST['unit_cost'])){

	$product = [
		'product_name' 	=> $_POST['product_name'],
		'unit_cost' 	=> $_POST['unit_cost'],
		'category_id' 	=> $_POST['product_category']
	];
	if(saveProduct($product, $CONNECTION)){

		header("Location: ".$SITE_URL.'produtos');	
	} else {
		// error
	}

} else {
	echo 'error';
}

?>
