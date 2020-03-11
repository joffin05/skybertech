<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$ISoftID=$_GET['s-id'];

$Query="DELETE FROM i_software WHERE ISoftID='$ISoftID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-software.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-software.php';</script>";	
	
}



?>


