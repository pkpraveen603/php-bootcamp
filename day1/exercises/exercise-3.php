<?php

// convert 1 string from snake to camel case
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

// apply the function to entire array
function convertToCamelCase($inputArray){
    return array_map('snakeToCamel',$inputArray);
}

print_r(convertToCamelCase(["snake_case", "camel_case"]));