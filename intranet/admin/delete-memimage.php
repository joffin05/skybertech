<?php


session_start();

if(!isset($_SESSION['Cxyzwet']))
 {
   header('location:index.php');
 };

include "db/config.php";

$IMEMIMGID=$_GET['mimg-id'];


$Queryer ="SELECT * FROM imemo_images WHERE IMEMIMGID='$IMEMIMGID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();
$IMemoID=$Rower['IMemoMID'];

$Query="DELETE FROM imemo_images WHERE IMEMIMGID='$IMEMIMGID'";

if ($conn->query($Query) === TRUE) {
	

header("location:memo-images.php?m-id=$IMemoID");
	
}
else
{

header("location:memo-images.php?m-id=$IMemoID");	
	
}



?>


