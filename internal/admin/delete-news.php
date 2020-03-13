<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$INewsID=$_GET['n-id'];

$Query="DELETE FROM i_news WHERE INewsID='$INewsID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-news.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-news.php';</script>";	
	
}



?>


