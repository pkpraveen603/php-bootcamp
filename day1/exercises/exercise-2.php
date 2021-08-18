<?php

// masks middle 6 digits of input phone number
function maskPhoneNumber($phoneNumber){
    $phoneNumber = "$phoneNumber";
    if (strlen($phoneNumber)!=10){
        throw new Exception("Invalid Number");
    }
    for ($i=2;$i<=7;$i++){
        $phoneNumber[$i]="*";
    }
    return $phoneNumber;
}

try {
    print(maskPhoneNumber(9876543210));
} catch (Exception $e) {
    print($e);
}