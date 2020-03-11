<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IClientID=$_GET['cl-id'];

$Query="DELETE FROM i_clients WHERE IClientID='$IClientID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-clients.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-clients.php';</script>";	
	
}



?>


