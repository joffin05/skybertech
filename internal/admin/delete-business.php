<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IBSID=$_GET['bs-id'];

$Query="DELETE FROM i_business WHERE IBSID='$IBSID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-business.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-business.php';</script>";	
	
}



?>


