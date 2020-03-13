<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IPhotoID=$_GET['p-id'];

$Query="DELETE FROM i_photogallery WHERE IPhotoID='$IPhotoID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-photogallery.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-photogallery.php';</script>";	
	
}



?>


