<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IBannerID=$_GET['b-id'];

$Query="DELETE FROM i_banner WHERE IBannerID='$IBannerID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-banner.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-banner.php';</script>";	
	
}



?>


