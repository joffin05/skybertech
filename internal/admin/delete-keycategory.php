<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IKeyCatID=$_GET['kp-id'];



$Query="DELETE FROM i_keypercategory WHERE IKeyCatID='$IKeyCatID'";
if ($conn->query($Query) === TRUE) {

 $Query_keyperson="DELETE FROM i_keyperson WHERE IKeyCategory='$IKeyCatID'";	
 $conn->query($Query_keyperson);	



echo "<script> alert('Deleted');window.location.href = 'manage-keycategory.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-keycategory.php';</script>";	
	
}



?>


