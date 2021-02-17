<?php
include_once '../functions.php'; 

$id = $_GET['id'];

deleteTax($id, $CONNECTION);
header("Location: ".$SITE_URL.'dashboard');	

?>
