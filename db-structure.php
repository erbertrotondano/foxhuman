<?php 
$tables = [
	[
	'table_name' => 'product_categories',
	'fields' => [
		'id serial PRIMARY KEY,',
		'category_name VARCHAR(999) NOT NULL'
		]
	],
	[
	'table_name' => 'products',
	'fields' => [
		'id serial PRIMARY KEY,',
		'product_name VARCHAR(9999) NOT NULL,',
		'unit_cost NUMERIC'
		]
	],
	[
	'table_name' => 'taxes',
	'fields' => [
		'id serial PRIMARY KEY,',
		'tax_name VARCHAR(99),',
		'tax_value NUMERIC'
	]
	]
];
function init_db($tables){
	$sql = '';

	foreach($tables as $table){
		$sql = $sql.'CREATE TABLE IF NOT EXISTS '.$table['table_name'].'(';
		foreach ($table['fields'] as $field){
			$sql = $sql.$field;
		}
		$sql = $sql.');';
	}
	$result = pg_query($sql);

	return $result;
}
function is_tables_created(){
	$sql = "SELECT 'products'::regclass;";

	var_dump(pg_query($sql));
}

?>