<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IVideoID=$_GET['v-id'];

$Query="DELETE FROM i_videogallery WHERE IVideoID='$IVideoID'";
if ($conn->query($Query) === TRUE) {
	

echo "<script> alert('Deleted');window.location.href = 'manage-videogallery.php';</script>";
	
}
else
{

echo "<script> alert('Error Try Again');window.location.href = 'manage-videogallery.php';</script>";	
	
}



?>


