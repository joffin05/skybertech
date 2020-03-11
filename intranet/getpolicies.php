<?php

header('Content-Type: application/json');

include "admin/db/config.php";

$list=array();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); 



$SearchKey=$input['SearchKey'];

$Query_memo ="SELECT * FROM i_memo WHERE IMType='Policies' AND IMTitle LIKE '%{$SearchKey}%' ORDER BY IMSortOrder ASC";
$Result_memo = $conn->query($Query_memo);


$Scene='<div>';

while($Row_memo = $Result_memo->fetch_assoc())
{

                       $Scene .='<div class="item">
                                <h4>
                                    <a href="memo-details.php?m-id='.$Row_memo['IMemoID'].'">'.$Row_memo['IMTitle'].'</a>
                                </h4>
                                <div class="meta">
                                   
                                    <a href="memo-details.php?m-id='.$Row_memo['IMemoID'].'" class="more">View >></a>
                                    
                                </div>
                                </div>';

                               

};

$Scene .='</div>';

$tempData = $Scene;

$cleanData =  json_encode($tempData);
print_r($cleanData);



?>