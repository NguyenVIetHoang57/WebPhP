<?php
$mysqli = new mysqli("localhost","root","","shop");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Không kết nối được MYSQLi" . $mysqli -> connect_error;
  exit();
}
?>