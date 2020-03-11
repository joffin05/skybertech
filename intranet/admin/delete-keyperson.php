<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IKeyPersonID=$_GET['k-id'];

$Query="DELETE FROM i_keyperson WHERE IKeyPersonID='$IKeyPersonID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-keyperson.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-keyperson.php';</script>";	
	
}



?>


