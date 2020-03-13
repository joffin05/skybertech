<?php

header('Content-Type: application/json');

include "admin/db/config.php";

$list=array();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); 



$Queryer_color ="SELECT * FROM i_general WHERE IGID=1";
$Resulter_color = $conn->query($Queryer_color);
$Rower_color = $Resulter_color->fetch_assoc();

$Btn_color=$Rower_color['IGColor'];

$SearchKey=$input['SearchKey'];

$Query_pro ="SELECT * FROM i_products WHERE IPName LIKE '%{$SearchKey}%' ORDER BY IPSortOrder ASC";
$Result_pro = $conn->query($Query_pro);


$scene='<div>';

while($Row_pro = $Result_pro->fetch_assoc())
{

                       $scene .='<div class="col-md-4 col-sm-6 single-item">
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="uploads/product-image/'.$Row_pro['IPImage'].'" alt="Thumb" style="width:100%;padding-top: 0px;">  
                                <div class="info-title">
                                    <h4>'.$Row_pro['IPName'].'</h4><br>
                                   
                                    <a href="product-details.php?pd-id='.$Row_pro['IProductID'].'" class="btn btn-theme effect btn-md" style="background-color:'.$Btn_color.'">Read More</a>
                                </div>
                            </div>    
                        </div>
                    </div>';


};

$scene .='</div>';

$tempData = $scene;

$cleanData =  json_encode($tempData);
print_r($cleanData);



?>