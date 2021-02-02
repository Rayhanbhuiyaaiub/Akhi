<?php
  session_start();
  include "database/data_access.php";
  include "validation/validation.php";
  $productName=$productPrice=$productQualityType=$productDying=" ";
  $productNameError="";
  $productPriceError="";
  $productQualityTypeError="";
  $productDyingError="";
  $productIdError="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['btnAdd']))
    {
      $productName=htmlspecialchars(mysqli_real_escape_string ($conn,$_POST ['productName']));
      $productPrice=htmlspecialchars(mysqli_real_escape_string ($conn,$_POST ['productPrice']));
      $productQualityType=htmlspecialchars(mysqli_real_escape_string ($conn,$_POST ['productQualityType']));
      $productDying=htmlspecialchars(mysqli_real_escape_string ($conn,$_POST ['productDying']));

      productInsert($productName,$productPrice,$productQualityType,$productDying);

    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="form" method="POST">
    
       
        <label>Product Name:</label>
        <input type="text" name="productName" value="<?php echo $productName;?>" required>
        <br>
        <label>Product Price:</label>
        <input type="text" name="productPrice" value="<?php echo $productPrice;?>" required>
        <br>
        <label>Quality type:</label>
        <input type="text" name="productQualityType" value="<?php echo $productQualityType;?>" required>
        <br>
        <label>Dying Name:</label>
        <input type="text" name="productDying" value="<?php echo $productDying;?>" required>
        <br>
        <button type="submit" name="btnAdd">ADD</button>
    </form>
</body>
</html>