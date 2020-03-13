<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IDepartmentID=$_GET['d-id'];

$Query="DELETE FROM i_department WHERE IDepartmentID='$IDepartmentID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-departments.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-departments.php';</script>";	
	
}



?>


