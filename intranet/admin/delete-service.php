<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IServiceID=$_GET['sr-id'];

$Query="DELETE FROM i_service WHERE IServiceID='$IServiceID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-services.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-services.php';</script>";	
	
}



?>


