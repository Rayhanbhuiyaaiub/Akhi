<?php
session_start();

include "database/data_access.php";

$firstName=  $lastName= $address = $phoneNumber = $userName = "";
$flag = 0; 


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['register']))
    {
       $firstName = htmlspecialchars( mysqli_real_escape_string($conn,$_POST['firstname']));
       $lastName = htmlspecialchars( mysqli_real_escape_string($conn,$_POST['lastname']));
       $phoneNumber = htmlspecialchars( mysqli_real_escape_string($conn,$_POST['phonenumber']));
       $address= htmlspecialchars( mysqli_real_escape_string($conn,$_POST['address']));
       $userName = htmlspecialchars( mysqli_real_escape_string($conn,$_POST['username']));
       
       echo"<script> alert(\" Register Button Press  \\n Name: ".$firstName. $lastName." \");</script>";
    }
    
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/registration.css">
    
    <title>Registration</title>
</head>

<body>
    
    <div class="container">
        <form class="form" method="POST">
            <div class="heading">
            
                <h1><a class="homeButton" href="index.php">Akhi</a> Registration Form </h1>
            </div>
            <div class="wrap">
                <div class="f1">
                    <label>First Name</label>
                    <input type="text" name="firstname" value="<?php  echo $firstName; ?>" required>
                    <span class="focus-input"></span>
                </div>
                <div class="f2">
                    <label>Last Name</label>
                    <input type="text" name="lastname" value="<?php  echo $lastName; ?>" required>
                    <span class="focus-input"></span>
                </div>
            </div>
            <div class="wrap2">
                <label>Username</label>
                <input type="text" name ="username" value="<?php  echo $userName; ?>" required>
                <span class="focus-input2"></span>
            </div>
            <div class="wrap2">
                <label>Address</label>
                <input type="text" name="address" value="<?php  echo $address; ?>" required> 
                <span class="focus-input2"></span>
            </div>
            <div class="wrap2">
                <label>Phone Number</label>
                <input type="text" max="11" name="phonenumber" value="<?php  echo $phoneNumber; ?>" required>
                <span class="focus-input2"></span>
            </div>
            <button class="btn" name="register" type="submit">Register</button>
            
           
        </form>
        <div class="image">
            <img src="photo/cotton.jpg" class="img">
        </div>
    </div>

</body>

</html>