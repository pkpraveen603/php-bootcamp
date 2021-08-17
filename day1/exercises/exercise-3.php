<?php
function snakeToCamel($inputString){
    $isUnderscore = false;
    $resultString = "";
    for ($i=0;$i<strlen($inputString);$i++) {
        if($isUnderscore){
            $inputString[$i] = strtoupper($inputString[$i]);
            $isUnderscore = false;
        }
        if($inputString[$i]=="_"){
            $isUnderscore=true;
        }
        else{
            $resultString=$resultString.$inputString[$i];
        }
    }
    return $resultString;
}

function convertToCamelCase($inputArray){
    $resultArray = [];
    foreach ($inputArray as  $item){
        array_push($resultArray,snakeToCamel($item));
    }
    return $resultArray;
}

print_r(convertToCamelCase(["snake_case", "camel_case"]));