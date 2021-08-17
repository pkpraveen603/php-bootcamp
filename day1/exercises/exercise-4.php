<?php

class Cricketers{

    public function __construct($inputString){
        $this->inputArray = json_decode($inputString,true);
    }

    // get and prints all names, age and cities
    public function getNamesCityAge(){
        $this->nameArray = [];
        $this->ageArray = [];
        $this->cityArray = [];
        foreach ($this->inputArray["players"] as $values){
            array_push($this->nameArray,$values["name"]);
            array_push($this->ageArray,$values["age"]);
            array_push($this->cityArray,$values["address"]["city"]);
        }
        print "Names:\n";
        print_r($this->nameArray);
        print "Ages:\n";
        print_r($this->ageArray);
        Print "Cities:\n";
        print_r($this->cityArray);
    }

    // gets unique names
    public function getUniqueNames($allNames){
        $allNames = array_map( 'strtolower', $allNames );
        $uniqueNames = array_unique($allNames);
        $uniqueNames = array_map( 'ucfirst', $uniqueNames );
        return $uniqueNames;
    }

    // gets names of people with max age in JSON
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

$CricketersJSON = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$cricketers = new Cricketers($CricketersJSON);
//q4 ans 1
$cricketers->getNamesCityAge();
//q4 ans 2
print "Unique Names:\n";
print_r($cricketers->getUniqueNames($cricketers->nameArray));
//q4 ans 3
print "People with max age in array:\n";
print_r($cricketers->getMaxAgePeople());

