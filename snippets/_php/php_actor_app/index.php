<?php 

require 'functions.php';

if (isset($_POST['q'])){
  connect();

  $letter = $_POST['q'];
  $actors = get_actors_by_last_name($letter);
  // print_r($actors);
}

include '_views/index.tmpl.php';
?>
   
