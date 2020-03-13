<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IProductID=$_GET['pd-id'];

$Query="DELETE FROM i_products WHERE IProductID='$IProductID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-products.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-products.php';</script>";	
	
}



?>


