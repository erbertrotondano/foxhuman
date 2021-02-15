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

// db functions
function getAllProducts($CONNECTION){
	$result = pg_query($CONNECTION, "SELECT * FROM products");	

	return pg_fetch_all($result);
}
function testDBconnection($CONNECTION){
	if ($result = pg_query($CONNECTION, "SELECT * FROM test_table")) {
	    printf("Select returned %d rows.\n", pg_num_rows($result));

	    /* free result set */
	    pg_free_result($result);
	}
}
?>

