<?php 
  include_once 'vars.php';

  $CONNECTION = pg_connect("host=".$host." dbname=".$db." user=".$user." password=".$pass);

  // db initialization 

  include_once 'db-structure.php';
