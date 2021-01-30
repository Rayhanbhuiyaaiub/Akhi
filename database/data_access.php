<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "akhiprint";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
  echo "Error: " . mysqli_connect_err();
  die();
}

function adminInsertion($adminId,$adminUserName,$adminName,$adminPassword,$adminPhone,$adminAddress)
{
  
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
