<?php

header('Content-Type: application/json');

include "admin/db/config.php";

$list=array();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); 


$BSearchKey=$input['BSearchKey'];

$Query_branch ="SELECT * FROM i_branches WHERE IBName LIKE '%{$BSearchKey}%' ORDER BY IBRSortOrder ASC";
$Result_branch = $conn->query($Query_branch);


$Scene='<div>';

while($Row_branch = $Result_branch->fetch_assoc())
{

                       $Scene .='<div class="info title col-md-4 col-sm-6 compartmentbox" style="height: 300px;">
                                <div class="thumb">
                                </div>
                                <div class="info">
                                <h4>'.$Row_branch['IBName'].'</h4>
                                <i class="fas fa-map-marked-alt"></i><p class="text-justify">
                                '.$Row_branch['IBAddress'].'</p>
                                <h5><i class="fas fa-phone"></i> '.$Row_branch['IBPhone'].'</h5>
                                <h5><i class="fas fa-envelope"></i> '.$Row_branch['IBEmail'].'</h5>
                                </div>   
                                </div>';


};

$Scene .='</div>';

$tempData['brnch'] = $Scene;


// NEXT

$CSearchKey=$input['CSearchKey'];

$Query_department ="SELECT * FROM i_department WHERE IDName LIKE '%{$CSearchKey}%' OR IDDEp LIKE '%{$CSearchKey}%' OR IDDesignation LIKE '%{$CSearchKey}%' OR IDPhone LIKE '%{$CSearchKey}%' OR IDEmail LIKE '%{$CSearchKey}%' ORDER BY IDSortOrder ASC";
$Result_department = $conn->query($Query_department);


$Scene1='<div>';

while($Row_department = $Result_department->fetch_assoc())
{

                       $Scene1 .='<div class="info title col-md-4 col-sm-6 compartmentbox" style="height: 250px;">
                                <div class="thumb">
                                </div>
                                <div class="info">
                                <strong><h4>'.$Row_department['IDDEp'].'</h4></strong>
                                <h5>'.$Row_department['IDName'].'</h5>
                                <strong><p class="text-justify">
                                '.$Row_department['IDDesignation'].'
                                </p></strong>

                                <h5><i class="fas fa-mobile-alt"></i> '.$Row_department['IDPhone'].'</h5>
                                <h5><i class="fas fa-envelope"></i> '.$Row_department['IDEmail'].'</h5>
                                </div>   
                                </div>';


};

$Scene1 .='</div>';

$tempData['dep'] = $Scene1;






$cleanData =  json_encode($tempData);
print_r($cleanData);



?>