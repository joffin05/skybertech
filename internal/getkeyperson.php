<?php

header('Content-Type: application/json');

include "admin/db/config.php";

$list=array();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); 



$SearchKey=$input['SearchKey'];
$keycat=$input['keycat'];

if(empty($SearchKey))
{   

if($keycat==0)
{

$Query_keyperson ="SELECT i_keyperson.*, i_keypercategory.* FROM i_keyperson INNER JOIN i_keypercategory ON i_keyperson.IKeyCategory=i_keypercategory.IKeyCatID WHERE i_keyperson.IKeyListing='True' ORDER BY i_keyperson.IKeySortOrder ASC";
$Result_keyperson = $conn->query($Query_keyperson);

}
else
{

$Query_keyperson ="SELECT i_keyperson.*, i_keypercategory.* FROM i_keyperson INNER JOIN i_keypercategory ON i_keyperson.IKeyCategory=i_keypercategory.IKeyCatID WHERE i_keyperson.IKeyCategory='$keycat' ORDER BY i_keyperson.IKeySortOrder ASC";
$Result_keyperson = $conn->query($Query_keyperson);


}

}
else
{


if($keycat==0)
{

$Query_keyperson ="SELECT i_keyperson.*, i_keypercategory.* FROM i_keyperson INNER JOIN i_keypercategory ON i_keyperson.IKeyCategory=i_keypercategory.IKeyCatID  AND (i_keyperson.IkeyPName LIKE '%{$SearchKey}%' OR i_keyperson.IKeyPhone LIKE '%{$SearchKey}%' OR i_keyperson.IkeyEmail LIKE '%{$SearchKey}%' OR i_keyperson.IkeyDesignation LIKE '%{$SearchKey}%') ORDER BY i_keyperson.IKeySortOrder ASC";
$Result_keyperson = $conn->query($Query_keyperson);

}
else
{

$Query_keyperson ="SELECT i_keyperson.*, i_keypercategory.* FROM i_keyperson INNER JOIN i_keypercategory ON i_keyperson.IKeyCategory=i_keypercategory.IKeyCatID WHERE i_keyperson.IKeyCategory='$keycat' AND (i_keyperson.IkeyPName LIKE '%{$SearchKey}%' OR i_keyperson.IKeyPhone LIKE '%{$SearchKey}%' OR i_keyperson.IkeyEmail LIKE '%{$SearchKey}%' OR i_keyperson.IkeyDesignation LIKE '%{$SearchKey}%') ORDER BY i_keyperson.IKeySortOrder ASC";
$Result_keyperson = $conn->query($Query_keyperson);


}



}



$Scene='<div>';

while($Row_keyperson = $Result_keyperson->fetch_assoc())
{

                       $Scene .='<a href="keyperson-details.php?k-id='.$Row_keyperson['IKeyPersonID'].'"><div class="col-md-3 col-sm-6 single-item">
                                 <div class="advisor-item">
                                 <div class="info-box">
                                 <img src="uploads/keyperson-image/'.$Row_keyperson['IKeyphoto'].'" alt="Thumb">  
                                 <div class="info-title">
                                 <h4>'.$Row_keyperson['IkeyPName'].'</h4>
                                 <span style="color:#000000">'.$Row_keyperson['IkeyDesignation'].'</span></br>
                                 <span style="color:red">'.$Row_keyperson['IKeyCatName'].'</span>
                                 </div>
                                 </div>    
                                 </div>
                                 </div></a> ';

                               

};

$Scene .='</div>';



$tempData = $Scene;

$cleanData =  json_encode($tempData);
print_r($cleanData);



?>