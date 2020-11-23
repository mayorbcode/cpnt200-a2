<?php

// DB connection
$conn = mysqli_connect('localhost', 'root', '', 'aviano-db');

// check connection
if(!$conn){
  header('Location: error.php');
}
?>