<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IBranchID=$_GET['b-id'];

$Query="DELETE FROM i_branches WHERE IBranchID='$IBranchID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-branches.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-branches.php';</script>";	
	
}



?>


