<?php 
include_once 'connection.php';

// Setting ENV VARS
$SITE_URL = "http://" . $_SERVER['SERVER_NAME'].'/foxhuman/';
// end of ENV VARS

// Initializng DB
init_db($tables);
// --------------

function getHeader(){
	include_once '../templates/header.php';
}
function getFooter(){
	include_once '../templates/footer.php';
}
function dd($dump){
	var_dump($dump);
	die();
}

// db functions
function getAllProducts($CONNECTION){
	$result = pg_query($CONNECTION, "SELECT * FROM products");	

	return pg_fetch_all($result);
}
function saveProduct($product, $CONNECTION){
	$sql = "INSERT INTO products (product_name, unit_cost, category_id) values ('".$product["product_name"]."', ".$product["unit_cost"].", ".$product["category_id"].");";

	$result = pg_query($CONNECTION, $sql);
	return($result);	
}
function deleteProduct($id, $CONNECTION){
	$sql = "DELETE FROM products WHERE id=".$id.";";
	
	$result = pg_query($CONNECTION, $sql);
	return($result);
}
function testDBconnection($CONNECTION){
	if ($result = pg_query($CONNECTION, "SELECT * FROM test_table")) {
	    printf("Select returned %d rows.\n", pg_num_rows($result));

	    /* free result set */
	    pg_free_result($result);
	}
}
function getAllProductCategories($CONNECTION){
	$result = pg_query($CONNECTION, "SELECT * FROM product_categories");	

	return pg_fetch_all($result);
}
function findCategory($id, $CONNECTION){
	$result = pg_query($CONNECTION, 'SELECT * FROM product_categories WHERE id = '.$id);

	return pg_fetch_all($result);
}
function findTaxByCategory($cat, $CONNECTION){

	$sql = 'SELECT * FROM product_category_taxes WHERE product_category_id = '.$cat.';';
	$result = pg_query($CONNECTION, $sql);
	
	return pg_fetch_all($result);

}
function saveProductCategory($product_category, $CONNECTION){
	$sql = "INSERT INTO product_categories (category_name) values ('".$product_category["category_name"]."');";

	$result = pg_query($CONNECTION, $sql);
	if($result){
		$sql = 'SELECT MAX(id) FROM product_categories';

		$id = pg_fetch_all(pg_query($CONNECTION, $sql))[0]['max'];
		return $id;
	} else {
		return($result);	
	}
	
}
function getAllTaxes($CONNECTION){
	$result = pg_query($CONNECTION, "SELECT * FROM taxes");	

	return pg_fetch_all($result);
}
function saveTax($tax, $CONNECTION){
	$sql = "INSERT INTO taxes (tax_name, tax_value) values ('".$tax["tax_name"]."', ".$tax["tax_value"].");";
	
	$result = pg_query($CONNECTION, $sql);
	return($result);	
}
function findTax($id, $CONNECTION){
	$sql = 'SELECT * FROM taxes WHERE id = '.$id.';';
	
	$result = pg_fetch_all(pg_query($CONNECTION, $sql));
	return($result);		
}
function saveProductCategoryTax($product_category_tax, $CONNECTION){
	$sql = "INSERT INTO product_category_taxes (tax_id, product_category_id) values ('".$product_category_tax["tax_id"]."', ".$product_category_tax["product_category"].");";

	$result = pg_query($CONNECTION, $sql);
	return($result);	
}
function dropTables($tables, $CONNECTION){
	$sql = '';
	foreach ($tables as $table) {
		$sql = $sql.'DROP TABLE '.$table['table_name'].';';
	}

	$result = pg_query($CONNECTION, $sql);
	return($result);
}
?>















