<?php
function arrayFlatten($inputArray){
    $resultArray = [];
    foreach ($inputArray as $value){
        if (is_array($value)){
            foreach ($value as $subValue){
                array_push($resultArray,$subValue);
            }
        }
        else{
            array_push($resultArray,$value);
        }
    }
    return $resultArray;
}

print_r(arrayFlatten([1,2,3,[4,5],[6,7],8]));

