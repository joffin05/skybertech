<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$ICategoryID=$_GET['c-id'];



$Query="DELETE FROM i_category WHERE ICategoryID='$ICategoryID'";
if ($conn->query($Query) === TRUE) {

$Query_image="DELETE FROM i_photogallery WHERE IPCat='$ICategoryID'";	
$conn->query($Query_image);	

$Query_video="DELETE FROM i_videogallery WHERE IVCat='$ICategoryID'";	
$conn->query($Query_video);	

echo "<script> alert('Deleted');window.location.href = 'manage-category.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-category.php';</script>";	
	
}



?>


