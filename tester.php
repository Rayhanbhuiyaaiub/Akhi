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

function getNextFileInformation(&$fileName,&$fileId)
{
    
    include "../akhiGit/database/data_access.php";
    include "validation/functions.php";
    $fileExsitCount= doesFileExist();

    if($fileExsitCount ==0)
    {
        $fileId="F100000";
        $fileName=$fileId.".pdf";
    }
    else
    {
        $query = "SELECT * FROM `filetracker` order by Id DESC limit 1";
        $result = mysqli_query($conn,$query);
    
   
        if($row=mysqli_fetch_assoc($result))
        {
            $lastFileId=$row['file_Id']; 

            $numberPart = intval(substr($lastFileId,1,3));
            $numberPart++;      
            return $numberPart;
        }
    }

} 
getNextFileInformation(); 
?>
