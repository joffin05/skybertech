<?php
$conn = mysqli_connect("localhost","internaladm","internalP@ssw0rd","internal");
//username password db_name

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>