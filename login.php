<?php 


include "validation/functions.php";

$fileName = __FILE__;
$fileName = explode('\\', $fileName);
$fileName = strtolower(end($fileName));

$adminCount = doesAdminExist();

if($adminCount<=0)
{
    header("location: initialAdminRegistration.php");
    die();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!--font awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jQeury Min -->
    <title>Login</title>
</head>
<body>
    <?php include "includes/topNavBar.php"; ?>
</body>
</html>