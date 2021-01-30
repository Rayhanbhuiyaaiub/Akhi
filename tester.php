<?php 
include "validation/validation.php";
$regex = "/^[A-Za-z0-9 ]*$/i" ;
//echo preg_match($regex,"rayhan");
$hay=" ";
$needle=" ";

function tester(&$isChanging)
{
    $isChanging =" Hello ,this is changed";
}


$ischanging="I am not changed";
tester($ischanging);
//echo $ischanging ;

 $index="Aayhan";
 echo "<br>";
 if($index[0]=="R")
 {
    // echo "This is correct";
 }
 else
 {
    // echo "This in incorrect";
 }
 
 

 
echo doubleSpCharChecker("rayhan  "," ");

getUserId();


?>
