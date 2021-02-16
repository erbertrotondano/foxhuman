<?php
include_once '../functions.php'; 

// Isset not working properly

if ( isset($_POST['tax_name']) && isset($_POST['tax_percentage'])){
	
	$tax = [
		'tax_name' => $_POST['tax_name'],
		'tax_value' => $_POST['tax_percentage']
	];
	if(saveTax($tax, $CONNECTION)){
		header("Location: ".$SITE_URL.'imposto');	
	} else {
		// error
	}
	
} else {
	echo 'error';
}

?>
