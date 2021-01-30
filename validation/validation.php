<?php 
$userFlag= 0;
function userNameValidation($userName,&$errorLabel)
{   
    $regex = "/^[A-Za-z0-9]*$/i" ;
    $multipleSpaceCheckerFlag = doubleSpCharChecker($userName," ");
    $multipleCommaCheckerFlag = doubleSpCharChecker($userName,",");
    $multipleDotCheckerFlag   = doubleSpCharChecker($userName,".");

    if($multipleCommaCheckerFlag || $multipleSpaceCheckerFlag || $multipleDotCheckerFlag)
    {
        $errorLabel="Multiple space,comma,dot can't support";
    }

   
    elseif(!preg_match($regex,$userName))
    {
        $errorLabel =" Incorrect username ";
    }

    elseif(empty($userName))
    {
        $errorLabel ="username can not be empty";
        return 1;
    }


    elseif (strlen($userName)==4 && $userName[0]=="A" )
    {
        

        if(is_numeric(substr($userName,1,3)))
        {
            $errorLabel ="Incorrect username";
            return 1;
        }
    }
    
    return 0;
}

function adminNameValidation($adminName,&$errorLabel)
{
    $regex = "/[A-Za-z]*$/i" ;

    if(!preg_match($regex,$adminName))
    {
        $errorLabel ="Incorrect AdminName ";
    }

    elseif(empty($adminName))
    {
        $errorLabel ="Admin name can not be empty";
        
    }

    elseif ($adminName[0]==" " || $adminName[0]=="," || $adminName[0]==".")
    {
        $errorLabel ="Incorrect admin name";
    }
    elseif(strlen($adminName) < 2)
    {
        $errorLabel ="Admin name must be up to 2 character";
    }
     return 0;
}



function adminPasswordValidation($adminPassword,&$errorLabel)
{
    if(empty($adminPassword))
    {
        $errorLabel ="Admin Password can not be empty";
        return 0;
    }
}   return 0;


function confirmPasswordValidation($confirmPassword,$adminPassword,&$errorLabel)
{
    if(empty($confirmPassword))
    {
        $errorLabel ="Confirm Password can not be empty";
        return 0;
    }

    elseif(empty($adminPassword===$confirmPassword))
    {
        $errorLabel =" Password field doesn't match";
        return 0;
    }

}   return 0;

function phoneNumberValidation($adminPhone,&$errorLabel)
{
    $regex ="/^[0-9]+$/" ;
    if(empty($adminPhone))
    {
        $errorLabel ="phone number field can not be empty ";
    }
    elseif(strlen($adminPhone)!=11)
    {
        $errorLabel ="Invalid Phone number ";
    }
    elseif(!preg_match($regex,$adminPhone))
    {
        $errorLabel ="Invalid Phone number ";
    }
}

function addressValidation($adminAddress,&$errorLabel)
{
    if(strlen($adminAddress) <2)
    {
        $errorLabel ="Invalid Address ";
    }
    elseif($adminAddress[0]==" " || $adminAddress[0]=="," || $adminAddress[0]==".")
    {
        $errorLabel ="Invalid Address ";

    }
}

function doubleSpCharChecker($hay,$needle)
 {
     for($i=0;$i<strlen($hay)-1;$i++)
     {   
          if ($hay[$i] == $needle && $hay[$i+1]==$needle )
         {
             return true;
         }
     }
     return false;

}

function getUserId()
{
    include "../akhiGit/database/data_access.php";

    $query = "SELECT * FROM `admin` order by id DESC limit 1";
    $result = mysqli_query($conn,$query);
    $nextAdminId="";
    if($row=mysqli_fetch_assoc($result))
    {
        $lastAdminId=$row['admin_id']; 

        $numberPart = intval(substr($lastAdminId,1,3));
        $numberPart++;      
        return 'A'. $numberPart;
    }
}


function adminInsertion($adminId,$adminUserName,$adminName,$adminPassword,$adminPhone,$adminAddress)
{
    include "../akhiGit/database/data_access.php";

    $query="INSERT INTO `admin` (`id`, `admin_id`, `user_name`, `admin_name`, `admin_address`, `admin_password`) VALUES (NULL, '$adminId', '$adminUserName', '$adminName', '$adminAddress', '$adminPassword');";
  
  
  
    if(mysqli_query($conn,$query)) 
    {
        
        $phoneInsertionQuery="INSERT INTO `admin_phone` (`id`, `admin_id`, `phone_number`) VALUES (NULL, '$adminId', '$adminPhone')";
        if(mysqli_query($conn,$phoneInsertionQuery))
        {
        return true;
        }
        else
        {
        return false;
        }
    }
    else
    {
        
        return false;
    }
    return false;
    }
    


?>