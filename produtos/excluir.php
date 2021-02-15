<?php
include_once '../functions.php'; 

$id = $_GET['id'];

deleteProduct($id, $CONNECTION);
header("Location: ".$SITE_URL.'produtos');	

?>
