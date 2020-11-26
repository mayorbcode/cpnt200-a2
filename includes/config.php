<?php

// local DB connection
// $conn = mysqli_connect('localhost', 'root', '', 'aviano-db');

// remote DB connection
$conn = mysqli_connect('r1bsyfx4gbowdsis.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'utr9fhy2j1401ypy', 'qo4pme8782cgrnid', 'zkry08kspo7qixa4');

// check connection
if(!$conn){
  header('Location: error.php');
  exit;
}
?>