<?php 




function doesAdminExist()
{

    include "../AkhiGit/database/data_access.php";

    $query = "Select * from admin";



    $result = mysqli_query($conn,$query);

    return mysqli_num_rows($result);

}


function doesProductExist()
{
    include "../AkhiGit/database/data_access.php";
    $query= "Select * from product";

    $result = mysqli_query($conn,$query);

    return mysqli_num_rows($result);

}

function doesFileExist()
{
    include "../AkhiGit/database/data_access.php";
    $query= "Select * from filetracker";

    $result = mysqli_query($conn,$query);

    return mysqli_num_rows($result);

}

?>