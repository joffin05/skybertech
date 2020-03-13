<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IMemoID=$_GET['m-id'];

$Query="DELETE FROM i_memo WHERE IMemoID='$IMemoID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-memo.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-memo.php';</script>";	
	
}



?>


