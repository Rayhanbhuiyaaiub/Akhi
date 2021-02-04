<?php

function generatePdf()
{
    $fileId="";
    $fileName="";
    getNextFileInformation($fileId,$fileName);
    echo $fileId;
    echo $fileName;
    
}
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

            $numberPart = intval(substr($lastFileId,1,6));
            $numberPart++;      
           $fileId='F'.$numberPart;
           $fileName=$fileId.".pdf";
        }
    }

}  

?>