<?php

include "database/data_access.php";
include "validation/genaratePdf.php";

$productArray = array();
$totalPrice = 0;
$discount = 0;
$totalQuantity= 0;
$subTotal= 0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(isset($_POST['btnPdf']))
    {
        $query = "SELECT * FROM `product` ";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $productPrice = $row['productPrice'];
            $productId = $row['productId'];

            $productQuantity = $_POST["Q_".$productId];

            $tempArray['id'] = $productId;
            $tempArray['price'] = $productPrice;
            $tempArray['quantity'] = $productQuantity;
            $tempArray['totalPrice'] = intval($productPrice)*intval($productQuantity);

            $totalPrice += $tempArray['totalPrice'];
            $totalQuantity += $tempArray['quantity'];

            array_push($productArray,$tempArray);

            
        }


        

    

        $discount = $_POST['disCount'];

        $subTotal = $totalPrice-$discount;
        




       generatePdf($productArray,$discount);
       

    }

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/table.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script>

   
        $(document).ready(function () {
        $('select').selectize({
          sortField: 'text'
        });
        });
    </script>
</head>
<body>
    <form action="" method="POST">
    <label>Product:</label>
    <select name="productList" id="" style=width:40%>
     <option value="" >Select a product</option>
     <?php 
       $query = "SELECT * FROM `product` ";
       $result = mysqli_query($conn,$query);
       while($row=mysqli_fetch_assoc($result))
       {
           echo "<option value=\"".$row['productId']."\">".$row['productName']."</option>";
       }
        
        ?>
    </select>
    <table id="receiptTable" class="redTable">
    <col width="25%" />
        <thead>
            <tr>
                <td >Product Name</td>
                <td>Price</td>
                <td>Quality Type</td>
                <td>Quantity</td>
                <td>Total Price</td>
            </tr>
                <tbody>

                <?php 
       $query = "SELECT * FROM `product` ";
       $result = mysqli_query($conn,$query);
       $productCounter = 0;
       while($row=mysqli_fetch_assoc($result))
       {
        ?>


          <tr>
              <td ><?php echo $row['productName'];?></td>
              <td><?php echo $row['productPrice'];?></td>
              <td><?php echo $row['productQualityType'];?></td>
              <td colspan="1"><input oninput="calculateTotal(<?php echo "'Q_". $row['productId']."',". $row['productPrice'] ; ?>)" type="number" name="<?php echo "Q_". $row['productId'];?>" id="<?php echo "Q_". $row['productId']; ?>" 
                 
              value="<?php 
              if(!empty($productArray[$productCounter]['quantity']))
              {
                  echo intval($productArray[$productCounter]['quantity']);
              }
              else
              {
                  echo intval("0");
              }
              ?>">
              </td>
              
              
              
              <td colspan="1"><label id="<?php echo "T_". $row['productId'];?>" name="<?php echo "T_". $row['productId'];?>">
              
              <?php 
              if(!empty($productArray[$productCounter]['totalPrice']))
              {
                  echo intval($productArray[$productCounter]['totalPrice']);
              }
              else
              {
                  echo intval("0");
              }
              
              ?></label></td>
              
              
          </tr>
       <?php
        $productCounter++;
        }
       
       ?>
        
            <tr>
                <td colspan="3"></td>
                <td id="totalQuan">Total quantity: <?=$totalQuantity?></td>
                <td id="totalPrice">Total Price: <?=$totalPrice?></td>

            </tr>


            <tr>
            
            <td colspan="3"></td>
            <td>Discount: </td>
            <td> <input oninput="updateSubTotal()" type="number" name="disCount" id="disCount" value="<?=$discount?>"></td>
            </tr>

            <tr>
            <td colspan="3"></td>
            <td>SubTotal: </td>
            <td> <label for="" id="subTotal"><?=$subTotal?></label></td>
            </tr>


            </tbody>
            
        </thead>


    </table>
    <button type="submit" name="btnPdf" id="btnPdf">Generate PDF</button>

    </form>
        <script src="script/receiptScript.js"></script>
</body>
</html>