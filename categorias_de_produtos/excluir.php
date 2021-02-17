<?php
include_once '../functions.php'; 

$id = $_GET['id'];

deleteProductCategory($id, $CONNECTION);
header("Location: ".$SITE_URL.'categorias_de_produtos');	

?>
