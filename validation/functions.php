<?php 




function doesAdminExist()
{

    include "../akhi/database/data_access.php";

    $query = "Select * from admin";



    $result = mysqli_query($conn,$query);

    return mysqli_num_rows($result);

}




?>