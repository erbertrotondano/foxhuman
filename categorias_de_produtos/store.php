<?php
include_once '../functions.php'; 


// Isset not working properly

if ( isset($_POST['category_name']) && isset($_POST['tax'])){

	
	$product_category = [
		'category_name' => $_POST['category_name'],
	];
	

	$product_category_id = saveProductCategory($product_category, $CONNECTION);

	if ($product_category_id != false){
		$product_category_tax = [
			'tax_id' 			=> $_POST['tax'],
			'product_category' 	=> $product_category_id
		];
		$result = saveProductCategoryTax($product_category_tax, $CONNECTION);

		header("Location: ".$SITE_URL.'categorias_de_produtos');	
	}
	else {
		echo 'ERROR';
	}
	

} else {
	echo 'error';
}

?>
