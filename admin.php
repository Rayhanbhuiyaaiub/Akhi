<?php
Session_start();

include "database/data_access.php";

$adminId = $adminName = $adminPassword = $adminAddress = "";
$flag = 0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(isset($_POST['register']))
    {
        $adminId = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminid']));
        $adminName = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminname']));
        $adminPassword = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminpassword']));
        $adminAddress = htmlspecialchars(mysqli_real_escape_string ($conn,$_POST['adminaddress']));

        echo"<script> alert(\" Register Button Press  \\n Name: ".$adminName . " \");</script>";
        

    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
    
<form class="form" method="POST">
    
    <div class="heading">
        <h1>Admin Registration Form</h1>
    </div>
    <div class="leveling">
        <div>
            <label>Admin Id</label>
            <input type="text" name="adminid" value="<?php  echo $adminId; ?>" required>
        </div>
        <div>
            <label>Admin Name</label>
            <input type="text" name="adminname" value="<?php  echo $adminName; ?>" required>
        </div>
            <label>Admin Password</label>
            <input type="password" name="adminpassword" value="<?php  echo $adminPassword; ?>" required>
        <div>
            <label>Admin Address</label>
            <input type="text" name="adminaddress" value="<?php  echo $adminAddress; ?>" required>
        </div>

        <button class="btn" name="register" type="submit">Register</button>
        

    </div>
 </form>
</body>
</html>