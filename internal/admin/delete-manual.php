<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IManualID=$_GET['mn-id'];

$Query="DELETE FROM i_manual WHERE IManualID='$IManualID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-manual.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-manual.php';</script>";	
	
}



?>


