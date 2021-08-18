<?php
// comment
# comment 1
/* comment 2*/
print "some text";
print "\n";
print "multi line
print statement
";
$var1 = 5;
print "This is gonna be some $var1  ";
$stringVar = "\nHello bro, how are ya\n";
echo("\nstring to be printed". " " .$stringVar);
echo(strlen($stringVar));
echo "\n";
echo strpos($stringVar,"bro");
echo "\n";

$array1 = array(1,2,3,4,5);
foreach ($array1 as $value){
    echo "$value \n";
}

$array1[5]=6;
print("$array1[5]\n");

$array2 = ["abdul"=>50, "akshay"=>100];

foreach ($array2 as $value){
    print "\n$value";
}

print_r($array1);
print_r($array2);

$array3 = ["a"=>["1"=>1],"b"=>["1"=>1]];
echo($array3["a"]["1"]." ".$array3["b"]["1"]);