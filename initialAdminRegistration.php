<?php
session_start();
include "database/data_access.php";
include "validation/validation.php";



$adminUserName = $adminName = $adminPassword = $adminAddress = $confirmPassword =$adminPhone= "";
$usernameError =" ";
$adminnameError =" ";
$adminPasswordError =" ";
$confirmPasswordError=" ";
$adminAddressError =" ";
$adminPhoneError =" ";
$flag = 0;


if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(isset($_POST['register']))
    {
        $adminUserName = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminusername']));
        $adminName = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminname']));
        $adminPassword = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminpassword']));
        $confirmPassword = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['confirmpassword']));
        $adminAddress = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminaddress']));
        $adminPhone = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminphone']));

        if(userNameValidation($adminUserName,$usernameError))
        {
            $flag =1;
           
        }
        
        if(adminNameValidation($adminName,$adminnameError))
        {
            $flag =1;
        }

        if(adminPasswordValidation($adminPassword,$adminPasswordError))
        {
            $flag= 1;
        }
        if(confirmPasswordValidation($confirmPassword,$adminPassword,$confirmPasswordError))
        {
            $flag= 1;
        }
        if(addressValidation($adminAddress,$adminAddressError))
        {
            $flag= 1;
        }
        if(phoneNumberValidation($adminPhone,$adminPhoneError))
        {
            $flag= 1;
        }
        if($flag==0)
        {
            if(adminInsertion(getUserId(),$adminUserName,$adminName,$adminPassword,$adminPhone,$adminAddress))
            {
                echo "<Script>alert('Congratulation Admin Inserted'); location.reload();</Script>";

            }

        }

    }

    
    


}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Admin Registration</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/reg.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <?php
    echo "<script> var userNameArray = [ ";

    $query="select * from admin; ";
    $userresult = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($userresult))
    {
        echo "\"".$row['user_name']."\"," ;
    }


    echo " ]; </script>";
    ?>

</head>
<body >
    <?php include "includes/topNavBar.php" ?>

<div class="container">
    <form class="form" method="POST">
        
    <div >
            <h1 class="headingText">Admin Registration Form</h1>
    </div>
    
    <div class="wrap">
            
            <label class ="label">User Name</label>
            <input oninput="onUserNameInput('errorUserName')"  class="inputF" type="text" id="adminusername"  name="adminusername" value="<?php  echo $adminUserName; ?>" required>
            <p id="errorUserName" class="errorLabel"><?php echo $usernameError; ?></p>
    </div >
        <div class="wrap">
            
            <label class ="label">Admin Name</label>
            <input oninput="onNameInput('errorAdminName')" class="inputF" type="text" name="adminname" id="adminname" value="<?php  echo $adminName; ?>" required>
            <p id="errorAdminName" class="errorLabel"><?php echo $adminnameError; ?></p>
        </div>
        <div class="Wrap2">
            <div class="f1">
            <label class ="label">Password</label>
            <input oninput="onPasswordInput('errorAdminPassword')" class="inputF" type="password" id="adminpassword" name="adminpassword" value="<?php  echo $adminPassword; ?>" required>
            <p id="errorAdminPassword" class="errorLabel"><?php echo $adminPasswordError; ?></p>
        </div>
            <div class="f2">
                <label class ="label" >Retype Password</label>
                <input oninput="onRePasswordInput('errorAdminCfmPassword')" class="inputF" type="password" id="confirmpassword" name="confirmpassword" value="<?php  echo $confirmPassword; ?>" required>
                <p id="errorAdminCfmPassword" class="errorLabel"><?php echo $confirmPasswordError; ?></p>
            </div>
        </div>
        <div class="wrap">
            <label class ="label">Address</label>
            <input oninput="onAddressInput('errorAdminAddress')" class="inputF" type="text" id="adminaddress" name="adminaddress" value="<?php  echo $adminAddress; ?>" required>
            <p id="errorAdminAddress" class="errorLabel"><?php echo $adminAddressError; ?></p>
        </div>
        <div class="wrap">
            <label class ="label">Phone</label>
            <input oninput="onPhoneInput('errorAdminPhone')" class="inputF" type="text" id="adminphone" name="adminphone" value="<?php  echo $adminPhone; ?>" required>
            <p id="errorAdminPhone" class="errorLabel"><?php echo $adminPhoneError; ?></p>
        </div>

        <button class="btn" name="register" id="register" type="submit">Register</button>

 </form>
 <img class = "image" src="photo/cotton.jpg">
 </div>
 <script src="script/regValidation.js"></script>
 
</body>
</html>