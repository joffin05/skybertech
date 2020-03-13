<?php
$conn = mysqli_connect("localhost","dbdmin","sULpXEm3N","internal");
//localhost username password db_name

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>