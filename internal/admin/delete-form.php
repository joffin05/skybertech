<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IFormID=$_GET['fr-id'];

$Query="DELETE FROM i_forms WHERE IFormID='$IFormID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-forms.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-forms.php';</script>";	
	
}



?>


