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

$Query_ser ="SELECT * FROM i_service WHERE ISName LIKE '%{$SearchKey}%' ORDER BY ISSortorder ASC";
$Result_ser = $conn->query($Query_ser);


$scene='<div>';

while($Row_ser = $Result_ser->fetch_assoc())
{

                       $scene .='<div class="col-md-4 col-sm-6 single-item">
                        <div class="advisor-item">
                            <div class="info-box">
                                <img src="uploads/service-image/'.$Row_ser['ISImage'].'" alt="Thumb" style="width:100%;padding-top: 0px;">  
                                <div class="info-title">
                                    <h4>'.$Row_ser['ISName'].'</h4><br>
                                    
                                    <a href="service-details.php?sr-id='.$Row_ser['IServiceID'].'" class="btn btn-theme effect btn-md" style="background-color:'.$Btn_color.'">Read More</a>
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