<?php 
  include_once 'vars.php';

  $CONNECTION = pg_connect("host=".$host." dbname=".$db." user=".$user." password=".$pass);
  var_dump($CONNECTION);
  /* check connection */
// if ($CONNECTION->connect_errno) {
//     printf("Connect failed: %s\n", $CONNECTION->connect_error);
//     exit();
// } else {
	

// }