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
function format_coin($value){
	return number_format($value, 2, ',');
}
// db functions
function getAllProducts($CONNECTION){
	$result = pg_query($CONNECTION, "SELECT * FROM products");	

	return pg_fetch_all($result);
}
function saveProduct($product, $CONNECTION){
	$sql = "INSERT INTO products (product_name, unit_cost, category_id, amount) values ('".$product["product_name"]."', ".$product["unit_cost"].", ".$product["category_id"].", ".$product['amount'].");";

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
function deleteProductCategory($id, $CONNECTION){
	$sql = "DELETE FROM product_categories WHERE id=".$id.";";
	
	$result = pg_query($CONNECTION, $sql);
	return($result);
}
function findProduct($id, $CONNECTION){
	$result = pg_query($CONNECTION, 'SELECT * FROM products WHERE id = '.$id);	

	return pg_fetch_all($result);
}
function findProductsByCategory($category_id, $CONNECTION){
	$sql = "SELECT * FROM products WHERE category_id = ".$category_id.";";

	return pg_fetch_all(pg_query($CONNECTION, $sql));
}
function sellProduct($params, $CONNECTION){

	$product = findProduct($params['product_id'], $CONNECTION)[0];
	// dd($params['amount']);
	if($params['amount'] <= $product['amount']){
		$sql = 'INSERT INTO shopping_items (product_id, shopping_car_id, amount) values ('.$params["product_id"].', '.$params["shopping_car_id"].', '.$params["amount"].');';
		
		$current_stock = $product['amount'] - $params['amount'];


		$update = 'UPDATE products SET amount = '.$current_stock.' WHERE id = '.$product['id'].';';

		$result = pg_query($CONNECTION, $update);	
		$status = [
			'id'		=> '200',
			'message'	=> 'Produto '.$product["product_name"].' vendido com sucesso'
		];
	} else {
		$status = [
			'id'		=> 'ST01',
			'message'	=> 'Não temos a quantidade desejada do produto '.$product["product_name"].' em estoque'
		];
	}

	return $status;

}
function initiateShoppingCar($CONNECTION){
	$date = date('d-m-y h:i:s');
	
	$sql = "INSERT INTO shopping_car (created_at) values (CURRENT_TIMESTAMP(0));";
	
	$insert_result = pg_query($CONNECTION, $sql);

	$sql = 'SELECT MAX(id) FROM shopping_car;';

	$car_id = pg_fetch_all(pg_query($CONNECTION, $sql))[0]['max'];

	return($car_id);


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
function deleteTax($id, $CONNECTION){
	$select 	= "SELECT product_category_id FROM product_category_taxes WHERE tax_id =".$id.";";
	$delete 	= "DELETE FROM taxes WHERE id=".$id.";";
	
	$delete=$delete."DELETE FROM product_category_taxes WHERE tax_id =".$id.";";
	
	$products_ids = [];
	$result = pg_fetch_all(pg_query($CONNECTION, $select));
	foreach ($result as $row) {
		deleteProductCategory($row['product_category_id'], $CONNECTION);

		$products = findProductsByCategory($row['product_category_id'], $CONNECTION);
		foreach ($products as $product){
			deleteProduct($product['id'], $CONNECTION);
		}
	}
	$delete_result = pg_query($CONNECTION, $delete);
	return($result);
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
function getProductCategoryTax($product, $CONNECTION){
	$sql = 'SELECT tax_id FROM product_category_taxes WHERE product_category_id = '.$product['category_id'].';';

	$tax_id = pg_fetch_all(pg_query($CONNECTION, $sql))[0]['tax_id'];

	$tax = findTax($tax_id, $CONNECTION);

	return($tax[0]);
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















