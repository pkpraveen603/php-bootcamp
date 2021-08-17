<?php

class Cricketers{

    public function __construct($inputString){

        $this->inputArray = json_decode($inputString,true);
    }

    public function getNames(){
        $resultArray = [];
        foreach ($this->inputArray["players"] as $values){
            array_push($resultArray,$values["name"]);
        }
        return $resultArray;
    }
    public function getUniqueNames($allNames){
        $allNames = array_map( 'strtolower', $allNames );
        $uniqueNames = array_unique($allNames);
        $uniqueNames = array_map( 'ucfirst', $uniqueNames );
        return $uniqueNames;
    }
    public function getMaxAgePeople(){
        $resultArray = [];
        $maxAge = 0;
        foreach ($this->inputArray["players"] as $values){
            if ($values["age"]>$maxAge){
                $resultArray = [$values["name"]];
                $maxAge = $values["age"];
            }
            elseif ($values["age"]==$maxAge){
                array_push($resultArray,$values["name"]);
            }
        }
        return $this->getUniqueNames($resultArray);
    }

}

$CricketersJSON = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"Age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$cricketers = new Cricketers($CricketersJSON);
$allNames = $cricketers->getNames();
//q4 ans 1
print_r($allNames);
//q4 ans 2
print_r($cricketers->getUniqueNames($allNames));
//q4 ans 3
print_r($cricketers->getMaxAgePeople());

